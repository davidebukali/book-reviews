<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review' => fake()->sentence(),
            'rating' => fake()->numberBetween(1, 5),
            'book_id' => Book::factory(),
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => fake()->dateTimeBetween('created_at' ,'now'),
        ];
    }

    public function good()
    {
        return $this->state(fn (array $attributes) => [
            'rating' => fake()->numberBetween(4, 5),
        ]);
    }

    public function bad()
    {
        return $this->state(fn (array $attributes) => [ 
            'rating' => fake()->numberBetween(1, 3),
        ]);
    }

    public function average()
    {
        return $this->state(fn (array $attributes) => [
            'rating' => fake()->numberBetween(2, 5),
        ]);
    }
}
