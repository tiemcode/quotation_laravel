<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'is_admin' => 1,
            'name' => 'admin',
            'email' => 'admin' . "@gmail.com",
            'phone' => '0621309445',
            'address' => 'adminstraat 1',
            'postal_code' => '1234AB',
            'city' => 'adminstad',
            'password' => Hash::make('adminadmin'),
            'updated_at' => date("Y/m/d"),
            'created_at' => date("Y/m/d")
        ],);
        $names = ['ige', 'timo', 'joost'];
        for ($i = 0; $i < count($names); $i++) {
            User::insert(
                [
                    'name' => $names[$i],
                    'email' => $names[$i] . "@gmail.com",
                    'phone' => '06123456789',
                    'address' => 'adminstraat 1',
                    'postal_code' => '1234AB',
                    'city' => 'adminstad',
                    'password' => Hash::make($names[$i] . $names[$i]),
                    'updated_at' => date("Y/m/d"),
                    'created_at' => date("Y/m/d")
                ],

            );
        }
    }
}
