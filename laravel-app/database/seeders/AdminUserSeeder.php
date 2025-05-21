<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'teste@firstdecision.com.br'
            ],
            [
                'name' => 'First Descision',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
