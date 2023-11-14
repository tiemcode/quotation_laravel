<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Seeder;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = ['eigenaar', 'medewerker', 'manger'];
        for ($i = 0; $i < count($arr); $i++) {
            role::insert(
                [
                    'name' => $arr[$i],
                    'created_at' => date('y/m/d'),
                    'updated_at' => date("Y/m/d"),
                ]
            );
        }
    }
}
