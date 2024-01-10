<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KonsultasiVirtualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 4) as $index) {
            DB::table('konsultasi_virtual')->insert([
                'nama' => $faker->name,
                'email' => $faker->email,
                'instansi' => $faker->company,
                'pekerjaan' => $faker->jobTitle,
                'tujuan' => $faker->sentence, // Added a random sentence for 'tujuan'
                'no_telp' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
