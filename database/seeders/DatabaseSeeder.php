<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Role;
use App\Models\units;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Traits\HasRolesAndPermissions;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void


    {
        $user = new User();


        User::create([
            'email' => 'Admin@gmail.com',
            'name' => 'Admin',
            'phone' => '01159890',
            'password' => bcrypt('12345678'),
            'user_type' => 'Admin',
        ]);

        $roles = [
            'Admin',
            'TeamLader',
            'Seles',
        ];
        foreach ($roles as $role) {
            Role::create(['name' => $role, 'slug' => $role]);
        }
        DB::table('users_roles')->insert([
            'user_id' => 1, 'role_id' => 1,
        ]);
    }
}
