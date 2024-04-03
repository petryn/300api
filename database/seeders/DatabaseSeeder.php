<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory()->has(Author::factory()->count(3))->create();
        Book::factory()->count(3)->has(Author::factory()->count(1))->create();

    }
}
