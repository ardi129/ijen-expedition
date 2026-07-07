<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence();

        return [
            'title' => rtrim($title, '.'),
            'slug' => Str::slug(rtrim($title, '.')),
            'excerpt' => $this->faker->sentence(15),
            'body' => $this->faker->paragraphs(5, true),
            'image' => 'https://images.unsplash.com/photo-1549487192-36e625a65c92?auto=format&fit=crop&q=80&w=800',
            'category' => 'Artikel Blog',
            'is_published' => $this->faker->boolean(80),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'view_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
