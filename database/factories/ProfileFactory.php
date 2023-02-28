<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1, //つぶやきを投稿したユーザーのIDをデフォルトで1とする
            'username' => $this->fake()->name(),
            'details' => $this->faker->realText(50),

        ];
        
    }
}
