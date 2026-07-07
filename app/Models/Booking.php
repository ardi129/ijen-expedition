<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_package_id',
        'name',
        'email',
        'phone',
        'travel_date',
        'number_of_people',
        'special_requests',
        'status',
        'payment_proof',
        'total_price',
        'payment_status',
        'payment_note',
    ];

    /**
     * @return array{travel_date: 'date', number_of_people: 'integer', total_price: 'integer'}
     */
    protected function casts(): array
    {
        return [
            'travel_date' => 'date',
            'number_of_people' => 'integer',
            'total_price' => 'integer',
        ];
    }

    /**
     * @return BelongsTo<TourPackage, $this>
     */
    public function tourPackage(): BelongsTo
    {
        return $this->belongsTo(TourPackage::class);
    }
}
