<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factory = Factory::create();
        for($i = 0; $i <= 10000; $i++) {
            User::create([
                'name'              => $factory->name(),
                'email'             => $factory->companyEmail(),
                'designation'       => $factory->jobTitle(),
                'phone'             => $factory->e164PhoneNumber(),
                'date_of_birth'     => $factory->dateTimeBetween('-60 years', '-19 years'),
                'joining_date'      => $factory->dateTimeBetween('-6 years', 'now'),
                'timezone'          => $factory->timezone(),
                'street'            => $factory->streetName(),
                'address'           => $factory->address(),
                'city'              => $factory->city(),
                'username'          => $factory->userName(),
                'email_verified_at' => $factory->dateTime(),
                'password'          => bcrypt('password'),
            ]);
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
