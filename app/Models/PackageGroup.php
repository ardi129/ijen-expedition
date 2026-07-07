<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageGroup extends Model
{
    protected $fillable = [
        'name',
        'description',
        'filter_type',
        'filter_value',
        'exclude_filter_type',
        'exclude_filter_value',
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
}
