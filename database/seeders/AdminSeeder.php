<?php
namespace Database\Seeders;
use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'password' => bcrypt('123456'),
        ]);
    }
}
