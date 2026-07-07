<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\TourPackage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<TourPackage>
 */
class TourPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(4);

        return [
            'category_id' => Category::factory(),
            'title' => rtrim($title, '.'),
            'slug' => Str::slug(rtrim($title, '.')),
            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3, true),
            'duration_days' => $this->faker->numberBetween(1, 4),
            'duration_nights' => $this->faker->numberBetween(0, 3),
            'price' => $this->faker->randomElement([250000, 350000, 450000, 750000, 1500000, 2000000, 0]),
            'price_note' => 'Hubungi Kami',
            'image' => 'https://images.unsplash.com/photo-1517650862521-d580d5348145?auto=format&fit=crop&q=80&w=800',
            'highlights' => [
                $this->faker->sentence(),
                $this->faker->sentence(),
                $this->faker->sentence(),
            ],
            'itinerary' => [
                ['time' => '07:00', 'activity' => 'Penjemputan di area Banyuwangi'],
                ['time' => '08:00', 'activity' => 'Perjalanan menuju destinasi'],
                ['time' => '10:00', 'activity' => 'Eksplorasi destinasi pertama'],
                ['time' => '13:00', 'activity' => 'Makan siang dan istirahat'],
                ['time' => '17:00', 'activity' => 'Kembali ke meeting point'],
            ],
            'includes' => [
                'Transportasi AC', 'Driver merangkap Guide', 'BBM & Parkir', 'Tiket Masuk', 'Air Mineral',
            ],
            'excludes' => [
                'Makan di luar itinerary', 'Pengeluaran Pribadi', 'Tipping',
            ],
            'is_featured' => $this->faker->boolean(40),
            'sort_order' => $this->faker->numberBetween(0, 20),
        ];
    }
}
