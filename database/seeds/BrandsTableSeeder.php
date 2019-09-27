<?php
use App\Models\Brands;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brands::create([
            'name'      =>  'Samsung',
            'active'  =>  1,
        ]);
    }
}
