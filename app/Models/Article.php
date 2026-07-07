<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'category',
        'is_published',
        'published_at',
        'view_count',
    ];

    /**
     * @return array{is_published: 'boolean', published_at: 'datetime', view_count: 'integer'}
     */
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
            'view_count' => 'integer',
        ];
    }

    /**
     * @param  Builder<Article>  $query
     * @return Builder<Article>
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
}
