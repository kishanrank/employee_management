<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::whereEmail('admin@admin.com')->first();

        if (!$admin) {
            User::create([
                'name' => 'Admin Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'role' => User::ROLE_ADMIN
            ]);
        }

        Department::insert([
            [
                'name' => 'Development',
                'status' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Sales',
                'status' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Human Resource',
                'status' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Finance',
                'status' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Marketing',
                'status' => 1,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
