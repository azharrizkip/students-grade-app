<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'date_of_birth' => $faker->date,
                'email' => $faker->email,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'student_id' => $faker->unique()->numberBetween(100000, 999999),
            ]);
        }
    }
}
