<?php

namespace Database\Seeders;

use App\Models\CompanyUser;
use Illuminate\Database\Seeder;

class companyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyUser::insert([
            'company_id' => 1,
            'user_id' => 2,
            'role_id' => 1,
        ]);
    }
}
