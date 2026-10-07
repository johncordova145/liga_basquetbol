<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class News extends Model
{
    // Laravel pluraliza "News" como "news", pero lo dejamos explícito por claridad.
    protected $table = 'news';

    protected $fillable = ['user_id', 'title', 'excerpt', 'body', 'image', 'published_at'];

    protected $casts = ['published_at' => 'datetime'];

    /** Genera un slug único (URL amigable) la primera vez que se guarda. */
    protected static function booted(): void
    {
        static::creating(function (News $news) {
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

    /** Solo noticias con fecha de publicación ya alcanzada (null = borrador). */
    public function scopePublished(Builder $q): Builder
    {
        return $q->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null && $this->published_at->lte(now());
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->image ? asset('assets/img/news/' . $this->image) : null);
    }

    /** Resumen para tarjetas: el extracto o, si no hay, el inicio del texto. */
    protected function summary(): Attribute
    {
        return Attribute::get(fn () => $this->excerpt ?: Str::limit(strip_tags($this->body), 140));
    }
}
