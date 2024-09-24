<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Employee;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the Admin user
        $admin = User::create([
            'code' => 'ADMIN001',
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'user_type' => 'admin',
        ]);

        // Create employee users
        $employees = [
            [
                'code' => 'EMP001',
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'),
                'user_type' => 'employee',
            ],
            [
                'code' => 'EMP002',
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password'),
                'user_type' => 'employee',
            ],
            // Add more employees as needed
        ];

        foreach ($employees as $empData) {
            $user = User::create($empData);

            // Create the associated employee record
            Employee::create([
                'user_id' => $user->id,
                'position' => 'Developer',
                'department' => 'IT',
                'hire_date' => now()->subYear(1),
            ]);
        }
    }
}
