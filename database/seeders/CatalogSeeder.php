<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan tabel terlebih dahulu sebelum menambahkan data
        DB::table('catalog')->truncate();

        // Membuat instance Faker
        $faker = Faker::create();

        // Tambahkan data dummy menggunakan Faker
        for ($i = 0; $i < 10; $i++) {
            // Menggunakan Lorem Picsum untuk URL gambar placeholder
            $image_url = "https://picsum.photos/800/600?random=" . $i;

            DB::table('catalog')->insert([
                'nama_buku' => $faker->sentence(3),
                'deskripsi' => $faker->paragraph(4),
                'tahun_terbit' => $faker->year,
                'link' => $faker->url, // Tambahkan field 'link' sesuai dengan migration
                'foto' => $image_url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
