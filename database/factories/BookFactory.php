<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "title" => fake()->unique()->text(13),
            "author" => fake()->name(),
            "genre" => fake()->text(10),
            "publicationYear" => fake()->year(),
            "ISBN" => fake()->numerify('###-#-#####-####-#'),
            "coverImageURL" => fake()->imageUrl(100,200),
        ];
    }
}
