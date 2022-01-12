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
            'email_verified_at' => Carbon::now()
        ]);
    }
}
