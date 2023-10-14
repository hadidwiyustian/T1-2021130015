<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 25; $i++) {
            $isbn = $faker->numberBetween(1000000000000, 9999999999999);
            $judul = $faker->sentence(3);
            $halaman = $faker->numberBetween(1, 999);
            $kategori = $faker->randomElement(['Uncategorized', 'Sci-fi', 'Novel', 'History', 'Biography', 'Romance', 'Education', 'Culinary', 'Comic']);
            $penerbit = $faker->word();
            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('books')->insert([
                'isbn' => $isbn,
                'judul' => $judul,
                'halaman' => $halaman,
                'kategori' => $kategori,
                'penerbit' => $penerbit,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
    }
    }
}
