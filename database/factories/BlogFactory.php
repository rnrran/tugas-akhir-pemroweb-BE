<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence(),
            'content' => implode("\n\n", $this->faker->paragraphs(5)),
            'user_id' => User::where('role', 'admin')->inRandomOrder()->first()->id,
            'description' => $this->faker->text(150),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
