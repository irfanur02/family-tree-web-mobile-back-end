<?php

namespace Database\Seeders;

// use App\Models\User;
use App\Models\Account;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Account::create([
            'username' => 'admin',
            'password' => 'admin',
        ]);

        Person::create([
            'account_id' => 2,
            'nick_name' => 'bima',
        ]);
    }
}
