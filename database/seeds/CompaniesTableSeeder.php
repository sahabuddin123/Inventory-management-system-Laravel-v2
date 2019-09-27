<?php
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'company_name'      =>  'Sa Private',
            'service_charge_value'  =>  '13',
            'vat_charge_value'  => '10',
            'address'  => 'Dhaka',
            'phone'  => '01867033550',
            'country'  => 'Bangladesh',
            'message'  => 'Hello Every one',
            'currency'  => 'BDT'
        ]);
    }
}
