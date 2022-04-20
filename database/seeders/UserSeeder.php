<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        // \App\Models\User::insert([
        //     [ 
        //         'name' => 'Left4code',
        //         'email' => 'midone@left4code.com',
        //         'email_verified_at' => now(),
        //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //         'gender' => 'male',
        //         'active' => 1,
        //         'remember_token' => Str::random(10)
        //     ]
        // ]);
        $user = User::create([
            'name' => 'Left4code',
            'email' => 'midone@left4code.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'gender' => 'male',
            'active' => 1,
        ]);
        $user->assignRole('marketing','admin','vendor');

        // Fake users
        // User::factory()->times(9)->create();
    }
}
