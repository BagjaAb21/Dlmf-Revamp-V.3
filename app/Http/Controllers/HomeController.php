<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $latestPosts = Post::with(['category', 'author'])
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        $teachers = Teacher::active()
            ->orderBy('order')
            ->take(4)
            ->get();

        return view('home', compact('latestPosts', 'teachers'));
    }
}
