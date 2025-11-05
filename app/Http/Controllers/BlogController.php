<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts
     */
    public function index(Request $request)
    {
        $searchTerm = $request->get('search');

        $posts = Post::with(['category', 'author'])
            ->published()
            ->search($searchTerm)
            ->latest('published_at')
            ->paginate(9);

        $posts->appends($request->query());

        $categories = Category::withCount('posts')->get();

        // Handle AJAX request untuk real-time search
        if ($request->ajax() || $request->wantsJson()) {
            $searchResults = $posts->map(function($post) use ($searchTerm) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'highlighted_title' => $searchTerm ? $post->getHighlightedTitle($searchTerm) : $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt ?? '',
                    'highlighted_excerpt' => $searchTerm ? $post->getHighlightedExcerpt($searchTerm) : ($post->excerpt ?? ''),
                    'thumbnail' => $post->thumbnail ? Storage::url($post->thumbnail) : null,
                    'category' => $post->category->name ?? 'Uncategorized',
                    'author' => $post->author->name ?? 'Admin',
                    'date' => $post->published_at->format('d M Y'),
                    'url' => route('blog.show', $post->slug)
                ];
            });

            return response()->json([
                'posts' => $searchResults,
                'total' => $posts->total(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'search_term' => $searchTerm ?? '',
                'has_search' => !empty($searchTerm)
            ]);
        }

        return view('blog.index', compact('posts', 'categories'));
    }

    /**
     * Display the specified blog post
     */
    public function show($slug)
    {
        $post = Post::with(['category', 'author'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Get previous post
        $prevPost = Post::published()
            ->where('published_at', '<', $post->published_at)
            ->latest('published_at')
            ->first();

        // Get next post
        $nextPost = Post::published()
            ->where('published_at', '>', $post->published_at)
            ->oldest('published_at')
            ->first();

        // Get related posts from same category
        $relatedPosts = Post::with(['category', 'author'])
            ->published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        // Get recent posts for sidebar
        $recentPosts = Post::with(['category', 'author'])
            ->published()
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts', 'prevPost', 'nextPost', 'recentPosts'));
    }

    /**
     * Display posts by category
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $searchTerm = request('search');

        $posts = Post::with(['category', 'author'])
            ->published()
            ->where('category_id', $category->id)
            ->search($searchTerm)
            ->latest('published_at')
            ->paginate(9);

        $posts->appends(request()->query());

        $categories = Category::withCount('posts')->get();

        // Handle AJAX request untuk real-time search
        if (request()->ajax() || request()->wantsJson()) {
            $searchResults = $posts->map(function($post) use ($searchTerm) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'highlighted_title' => $searchTerm ? $post->getHighlightedTitle($searchTerm) : $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt ?? '',
                    'highlighted_excerpt' => $searchTerm ? $post->getHighlightedExcerpt($searchTerm) : ($post->excerpt ?? ''),
                    'thumbnail' => $post->thumbnail ? Storage::url($post->thumbnail) : null,
                    'category' => $post->category->name ?? 'Uncategorized',
                    'author' => $post->author->name ?? 'Admin',
                    'date' => $post->published_at->format('d M Y'),
                    'url' => route('blog.show', $post->slug)
                ];
            });

            return response()->json([
                'posts' => $searchResults,
                'total' => $posts->total(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'search_term' => $searchTerm ?? '',
                'has_search' => !empty($searchTerm)
            ]);
        }

        return view('blog.category', compact('posts', 'category', 'categories'));
    }
}
