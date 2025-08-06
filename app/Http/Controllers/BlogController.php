<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'author'])
            ->published()
            ->latest('published_at')
            ->paginate(9);

        $categories = Category::withCount('posts')->get();

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::with(['category', 'author'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $relatedPosts = Post::with(['category', 'author'])
            ->published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::with(['category', 'author'])
            ->published()
            ->where('category_id', $category->id)
            ->latest('published_at')
            ->paginate(9);

        $categories = Category::withCount('posts')->get();

        return view('blog.category', compact('posts', 'category', 'categories'));
    }
}
