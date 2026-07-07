<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_package_id',
        'name',
        'email',
        'rating',
        'comment',
        'is_visible',
        'admin_feedback',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'is_visible' => 'boolean',
        ];
    }

    public function tourPackage(): BelongsTo
    {
        return $this->belongsTo(TourPackage::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
