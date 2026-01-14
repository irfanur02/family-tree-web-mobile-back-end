<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static ?string $password;

    public function definition(): array
    {
        // return [
        //     'username' => fake()->name(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'email' => fake()->unique()->safeEmail()
        // ];
        return [
            'username' => 'irfan',
            'password' => '123',
            'email' => fake()->unique()->safeEmail()
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email' => null,
        ]);
    }
}
