<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID'); // Use Indonesian locale for realistic names

        for ($i = 0; $i < 10; $i++) { // Modify 100 to desired number of entries
            $user = [
                'id' => $faker->uuid,
                'username' => $faker->unique()->userName, // Use unique username as 'username' column is set to unique in users table
                'fullname' => $faker->name,
                'email' => $faker->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('secret'), // Replace with desired password hashing
                'remember_token' => null,
            ];

            // Optionally add fake data for other columns based on their data types:
            // - You can use Faker methods like $faker->address for addresses
            // - You can generate timestamps within a specific range
            // - You can use conditional statements to control data distribution

            DB::table('users')->insert($user);
        }
    }
}
