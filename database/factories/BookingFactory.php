<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\TourPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tour_package_id' => TourPackage::factory(),
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'travel_date' => $this->faker->dateTimeBetween('+1 week', '+3 months')->format('Y-m-d'),
            'number_of_people' => $this->faker->numberBetween(1, 10),
            'special_requests' => $this->faker->optional(0.3)->sentence(),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
