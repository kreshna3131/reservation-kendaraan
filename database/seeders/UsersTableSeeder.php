<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            User::create([
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'email_verified' => '1',
            ]);
        });
    }
}
