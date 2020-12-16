<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<5;$i++){
            DB::table('users')->insert([
                'name'=> "user".rand(1,5),
                'email'=> $faker->unique()->email,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
