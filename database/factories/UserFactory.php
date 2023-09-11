<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first(); // Get a random user from the database.

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'profile_picture_url' => $this->faker->imageUrl,
            'car' => $this->faker->word,
            'bio' => $this->faker->text,
            'location' => $this->faker->city,
            'meets_organised' => $this->faker->numberBetween(0, 100),
            'rating' => $this->faker->numberBetween(0, 5),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
