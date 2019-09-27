<?php

use App\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
 
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        Admin::create([
            'username'      =>  $faker->name,
            'password'  =>  bcrypt('1032000'),
            'email'     =>  'sahabuddinriyaj984@gmail.com',
        ]);
    }
}
