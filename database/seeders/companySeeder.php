<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::insert([
            'company_name' => 'custom websites',
            'contact_person' => 'patrick de vos',
            'address' => 'atoomweg 2j',
            'postal_code' => '1234AB',
            'city' => 'groningen',
            'email' => 'dev@customweb.net',
            'phone' => '0612345678',
            'updated_at' => date("Y/m/d"),
            'created_at' => date("Y/m/d")
        ]);
    }
}
