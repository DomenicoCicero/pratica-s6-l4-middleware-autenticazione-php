<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 4; $i++) {
            DB::table('books')->insert([
                'title' => fake()->words(rand(3, 10), true),
                'price' => rand(100, 350),
                'author' => fake()->name(),
                'img' => fake()->imageUrl(640, 480),
                'user_id' => rand(1, 5),
            ]);
        }
    }
}
