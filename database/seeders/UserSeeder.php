<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Abraham',
            'email' => 'abrahamag93@gmail.com',
            'password' => Hash::make('abraham'),
            'email_verified_at' => Carbon::now(),

        ])->assignRole('Admin');

        User::create([
            'name' => 'Dayanara',
            'email' => 'dayanara.montalvo0@gmail.com',
            'password' => Hash::make('dayanara'),
            'email_verified_at' => Carbon::now(),

        ])->assignRole('Blogger');


        User::create([
            'name' => 'Braulio',
            'email' => 'braulio.robles@gmail.com',
            'password' => Hash::make('braulio'),
            'email_verified_at' => Carbon::now(),
        ])->assignRole('User');
    }
}
