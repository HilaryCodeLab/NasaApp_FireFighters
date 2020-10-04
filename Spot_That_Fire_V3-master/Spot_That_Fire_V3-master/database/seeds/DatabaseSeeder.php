<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $faker = Faker::create();
        foreach ( range(1,10) as $item) {
            DB::table('fire_incidents')->insert([
                'created_at' => $faker->dateTime,
                'title'=> $faker->title(),
                'first_name' => $faker->firstName,
                'last_name'=> $faker->lastName,
                'email'=>$faker->email,
                'phone_number'=>$faker->phoneNumber,
                'ip_address'=>$faker->ipv4,
                'message'=>$faker->paragraph
                                              ]);
        }
    }
}
