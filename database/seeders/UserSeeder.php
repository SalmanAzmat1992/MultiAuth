<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\table;

class UserSeeder extends Seeder
{
    /**
     * @var string
     */
    protected static ?string $password;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Muhammad Salman Azmat",
            'username' => 'msalman098',
            'email' => 'msalman@gmail.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('asdasd123'),
            'role' => '1',
            'image'=> fake()->imageUrl(60,60),
            'is_active' => 1,
        ]);
    }
}
