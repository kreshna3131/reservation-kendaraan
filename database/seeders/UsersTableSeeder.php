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
        User::create([
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$u6dYyV/JHB72q0D8hCWwWuCJdvojm5BItV9F6Lwb/vWELWd7BgDwa',
        ]);
    }
}
