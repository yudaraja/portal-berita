<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk thumbnail
        ]);

        // Menyimpan thumbnail jika ada file yang di-upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            $thumbnailPath = null; // Atau bisa diisi default value jika diperlukan
        }

        // Menyimpan post dengan user_id yang diisi
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $user->id,
            'category_id' => $request->input('category_id'),
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('post.index')->with('success', 'Berhasil menambahkan post');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk thumbnail
        ]);

        // dd($request->all());

        // Menyimpan path thumbnail jika ada file baru yang di-upload
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($post->thumbnail && Storage::exists($post->thumbnail)) {
                Storage::delete($post->thumbnail);
            }

            // Simpan thumbnail baru
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        } else {
            // Gunakan thumbnail lama jika tidak ada file baru
            $thumbnailPath = $post->thumbnail;
        }

        // Menyimpan post dengan user_id yang diisi
        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $user->id,
            'category_id' => $request->input('category_id'),
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('post.index')->with('success', 'Berhasil mengubah post');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Post berhasil dihapus');
    }
}
