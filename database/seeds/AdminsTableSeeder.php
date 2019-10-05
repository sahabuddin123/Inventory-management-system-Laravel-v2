<?php

use App\Models\Admins;
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
        Admins::create([
            'username'   => 'sahabuddin123',
            'email'     =>  'sahabuddinriyaj984@gmail.com',
            'password'  =>  bcrypt('1032000'),
            'firstname' =>  'Sahab',
            'lastname'  =>  'Uddin',
            'gender'    =>  1,
            'image'   => "admin/no_picture.png"
        ]);
    }
}
