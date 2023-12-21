<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KoleksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            \DB::table('koleksi')->insert([
                'namaKoleksi' => $faker->name,
                'jenisKoleksi' => $faker->randomElement(['Buku', 'Majalah', 'Koran', 'CD', 'DVD']),
                'jumlah' => $faker->numberBetween(1, 100),
                'deskripsi' => $faker->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
