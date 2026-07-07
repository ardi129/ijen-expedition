<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'duration_days',
        'duration_nights',
        'price',
        'price_note',
        'image',
        'highlights',
        'itinerary',
        'includes',
        'excludes',
        'is_featured',
        'sort_order',
    ];

    /**
     * @return array{highlights: 'array', itinerary: 'array', includes: 'array', excludes: 'array', is_featured: 'boolean', price: 'integer', duration_days: 'integer', duration_nights: 'integer'}
     */
    protected function casts(): array
    {
        return [
            'highlights' => 'array',
            'itinerary' => 'array',
            'includes' => 'array',
            'excludes' => 'array',
            'is_featured' => 'boolean',
            'price' => 'integer',
            'duration_days' => 'integer',
            'duration_nights' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsToMany<Destination, $this>
     */
    public function destinations(): BelongsToMany
    {
        return $this->belongsToMany(Destination::class, 'package_destination');
    }

    /**
     * @return HasMany<Booking, $this>
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * @return HasMany<Review, $this>
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews(): HasMany
    {
        return $this->hasMany(Review::class)->where('is_visible', true);
    }

    public function averageRating(): float
    {
        return round($this->approvedReviews()->avg('rating') ?? 0, 1);
    }

    /** Format harga dalam Rupiah. */
    public function formattedPrice(): string
    {
        if ($this->price === 0) {
            return $this->price_note ?? 'Hubungi Kami';
        }

        return 'Rp '.number_format($this->price, 0, ',', '.');
    }

    /** Format durasi trip. */
    public function formattedDuration(): string
    {
        $parts = [];

        if ($this->duration_days > 0) {
            $parts[] = $this->duration_days.' Hari';
        }

        if ($this->duration_nights > 0) {
            $parts[] = $this->duration_nights.' Malam';
        }

        return implode(' ', $parts) ?: '1 Hari';
    }
}
