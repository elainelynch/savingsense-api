<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()
        ->hasTransactions(2)
        ->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);

        Transaction::factory()
        ->create([
            'type' => 'expense',
            'category' => 'electric bill',
            'amount' => '1500',
            'date' => '2023-08-09'
        ]);


    }
}
