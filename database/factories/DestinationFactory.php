<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->city();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(),
            'location' => 'Banyuwangi, Jawa Timur',
            'image' => 'https://images.unsplash.com/photo-1555505019-8c3f1c4aba5f?auto=format&fit=crop&q=80&w=800',
            'is_featured' => $this->faker->boolean(30),
            'sort_order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
