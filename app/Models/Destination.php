<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'location',
        'image',
        'is_featured',
        'sort_order',
    ];

    /**
     * @return array{is_featured: 'boolean', sort_order: 'integer'}
     */
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(fn () => str_starts_with($this->image, '/') || filter_var($this->image, FILTER_VALIDATE_URL)
            ? asset($this->image)
            : Storage::url($this->image));
    }

    /**
     * @return BelongsToMany<TourPackage, $this>
     */
    public function tourPackages(): BelongsToMany
    {
        return $this->belongsToMany(TourPackage::class, 'package_destination');
    }
}
