<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    protected $fillable = [
        'key',
        'title',
        'subtitle',
        'content',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
