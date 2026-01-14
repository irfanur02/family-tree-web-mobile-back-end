<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Account;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // return [
        //     'full_name' => fake()->name(),
        //     'nick_name' => fake()->firstName(),
        //     'account_id' => Account::factory(),
        //     'image' => fake()->imageUrl(640, 480, 'person', true),
        //     'gender' => 'L',
        //     'birth_date' => fake()->date()
        // ];
        return [
            'full_name' => 'irfanur rochman',
            'nick_name' => 'irfan',
            'account_id' => Account::factory(),
            'image' => fake()->imageUrl(640, 480, 'person', true),
            'gender' => 'L',
            'birth_date' => '2000-02-27'
        ];
    }
}