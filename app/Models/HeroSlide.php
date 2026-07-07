<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'cta_text',
        'cta_link',
        'cta_text_2',
        'cta_link_2',
        'sort_order',
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

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function getImageUrlAttribute(): string
    {
        if (str_starts_with($this->image, '/')) {
            return asset($this->image);
        }

        return asset('storage/'.$this->image);
    }
}
