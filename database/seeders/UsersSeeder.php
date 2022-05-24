<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'rawdaTest@gmail.com'],[
            'name'     => 'Rawda Sherif',
            'email'    => 'rawdaTest@gmail.com',
            'password' => '12345678',
        ]);
    }
}
