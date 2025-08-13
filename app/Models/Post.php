<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'category_id',
        'user_id',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Post $post) {
            // Use the Auth facade for reliability and check if a user is authenticated.
            if (!$post->user_id && Auth::check()) {
                $post->user_id = Auth::id();
            }
            $post->slug = static::generateUniqueSlug($post->title);
        });

        static::updating(function (Post $post) {
            if ($post->isDirty('title')) {
                $post->slug = static::generateUniqueSlug($post->title, $post->id);
            }
        });
    }

    /**
     * Generate a unique slug for the post.
     */
    protected static function generateUniqueSlug(string $title, ?int $exceptId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (true) {
            $query = static::where('slug', $slug);

            if ($exceptId !== null) {
                $query->where('id', '!=', $exceptId);
            }

            if (!$query->exists()) {
                break;
            }

            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    /**
     * Search scope for posts
     */
    public function scopeSearch($query, $term)
    {
        if (!$term) {
            return $query;
        }

        return $query->where(function($q) use ($term) {
            $q->where('title', 'LIKE', '%' . $term . '%')
              ->orWhere('excerpt', 'LIKE', '%' . $term . '%')
              ->orWhere('content', 'LIKE', '%' . $term . '%');
        });
    }

    /**
     * Highlight search term in text
     */
    public function highlightSearchTerm($text, $searchTerm)
    {
        if (!$searchTerm) {
            return $text;
        }

        return preg_replace(
            '/(' . preg_quote($searchTerm, '/') . ')/i',
            '<mark>$1</mark>',
            $text
        );
    }

    /**
     * Get highlighted title for search results
     */
    public function getHighlightedTitle($searchTerm = null)
    {
        $searchTerm = $searchTerm ?: request('search');
        return $this->highlightSearchTerm($this->title, $searchTerm);
    }

    /**
     * Get highlighted excerpt for search results
     */
    public function getHighlightedExcerpt($searchTerm = null, $limit = 150)
    {
        $searchTerm = $searchTerm ?: request('search');
        $excerpt = Str::limit($this->excerpt, $limit);
        return $this->highlightSearchTerm($excerpt, $searchTerm);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
}
