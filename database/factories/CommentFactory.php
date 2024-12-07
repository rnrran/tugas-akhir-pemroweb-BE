<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Comment::class;
    public function definition()
    {
        return [
            'content' => $this->faker->sentence(),
            'user_id' => User::inRandomOrder()->first()->id,
            'blog_id' => Blog::inRandomOrder()->first()->id,
        ];
    }
}
