<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 5)),
            'ref_id' => $this->faker->uuid(),
            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 5),
            'excerpt' => $this->faker->paragraph(),
//            'body' => '<p>' . implode('</p><p>',$this->faker->paragraphs(mt_rand(5, 10))) . '</p>'
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn($p) => "<p>$p</p>")
                ->implode('')
        ];
    }
}
