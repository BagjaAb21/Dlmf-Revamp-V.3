<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Category $category) {
            $category->slug = static::generateUniqueSlug($category->name);
        });

        static::updating(function (Category $category) {
            if ($category->isDirty('name')) {
                $category->slug = static::generateUniqueSlug($category->name, $category->id);
            }
        });
    }

    /**
     * Generate a unique slug for the category.
     */
    protected static function generateUniqueSlug(string $name, ?int $exceptId = null): string
    {
        $slug = Str::slug($name);
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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
