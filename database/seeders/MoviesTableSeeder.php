<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'The Matrix',
                'duration' => 136,
                'release_date' => Carbon::parse('1999-03-31'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Inception',
                'duration' => 148,
                'release_date' => Carbon::parse('2010-07-16'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Interstellar',
                'duration' => 169,
                'release_date' => Carbon::parse('2014-11-07'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Dark Knight',
                'duration' => 152,
                'release_date' => Carbon::parse('2008-07-18'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'duration' => 201,
                'release_date' => Carbon::parse('2003-12-17'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
