<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $countUser = User::all()->count();
        $posts = Post::all()->count();
        $category = Category::all()->count();
        return view('admin.dashboard', compact('users', 'posts', 'category', 'countUser'));
    }
}
