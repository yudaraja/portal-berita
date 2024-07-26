<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\Post;
use Illuminate\Http\Request;

class PortalBeritaController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $recommendedPosts = Post::latest()->take(5)->get();
        return view('portal-berita.home', compact('posts', 'recommendedPosts'));
    }

    public function show($slug)
    {
        // dd($slug);
        $post = Post::where('slug', $slug)->firstOrFail();
        $recommendedPosts = Post::where('id', '!=', $post->id)->orderBy('created_at', 'desc')->take(5)->get();

        return view('portal-berita.detail', compact('post', 'recommendedPosts'));
    }


    public function contact()
    {
        $categories = Category::all();
        return view('portal-berita.contact', compact('categories'));
    }

    public function feedback(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data ke database
        Feedback::create($validatedData);

        // Redirect atau beri respons
        return redirect()->back()->with('success', 'Feedback berhasil dikirim.');
    }
}
