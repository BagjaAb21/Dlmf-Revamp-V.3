<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->get('search');

        $posts = Post::with(['category', 'author'])
            ->published()
            ->search($searchTerm)
            ->latest('published_at')
            ->paginate(6);

        // Pertahankan parameter search dalam pagination
        $posts->appends($request->query());

        $categories = Category::withCount('posts')->get();

        // Tambahkan recent posts untuk sidebar
        $recentPosts = Post::with(['category', 'author'])
            ->published()
            ->latest('published_at')
            ->take(5)
            ->get();

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
                    'thumbnail' => $post->thumbnail,
                    'category' => $post->category->name ?? 'Uncategorized',
                    'date' => $post->published_at->format('jS M y'),
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

        return view('blog.index', compact('posts', 'categories', 'recentPosts'));
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

    public function showDetailed(Post $post)
    {
    $recentPosts = Post::published()
        ->latest('published_at')
        ->take(6) // sesuai grid recent
        ->get();

    $relatedPosts = Post::published()
        ->where('id', '!=', $post->id)
        ->when($post->category_id, fn($q)=>$q->where('category_id', $post->category_id))
        ->latest('published_at')
        ->take(6)
        ->get();

    $prevPost = Post::published()
        ->where('published_at', '<', $post->published_at)->latest('published_at')->first();

    $nextPost = Post::published()
        ->where('published_at', '>', $post->published_at)->oldest('published_at')->first();

    return view('blog.show', compact('post','recentPosts','relatedPosts','prevPost','nextPost'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = Post::with(['category', 'author'])
            ->published()
            ->where('category_id', $category->id)
            ->search(request('search'))
            ->latest('published_at')
            ->paginate(6);

        // Pertahankan parameter search dalam pagination
        $posts->appends(request()->query());

        $categories = Category::withCount('posts')->get();

        // Tambahkan recent posts untuk sidebar
        $recentPosts = Post::with(['category', 'author'])
            ->published()
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('blog.category', compact('posts', 'category', 'categories', 'recentPosts'));
    }
}
