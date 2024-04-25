<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use function Laravel\Prompts\table;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(
            [
                'name' => 'SuperAdmin',
                'display_name' => 'super_admin',
                'description' => 'Super Admin',
            ]
        );
        Role::create(
            [
                'name' => 'Admin',
                'display_name' => 'admin',
                'description' => 'Admin',
            ]
        );
        Role::create(
            [
                'name' => 'Customer',
                'display_name' => 'customer',
                'description' => 'Customer',
            ]
        );
    }
}
