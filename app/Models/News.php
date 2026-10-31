<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'user_id', 
        'title', 
        'slug',         
        'excerpt', 
        'content', 
        'image', 
        'published_at'
    ];
    

    protected $casts = [
        'published_at' => 'datetime'
    ];

    protected static function booted(): void
    {
        static::creating(function ( $news) {
            if ($news->slug) {
                return;
            }

            $base = Str::slug($news->title) ?: 'noticia';
            $slug = $base;
            $i = 2;

            while (static::where('slug', $slug)->exists()) {
                $slug = "{$base}-{$i}";
                $i++;
            }

            $news->slug = $slug;
        });
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}