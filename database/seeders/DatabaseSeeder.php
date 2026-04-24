<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SpatieRolesPermissionSeeder::class,
            UserSeeder::class,
            CategoryAndProductSeeder::class,
            OrderSeeder::class,
        ]);
    }
}