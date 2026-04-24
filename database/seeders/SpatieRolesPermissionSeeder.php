<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpatieRolesPermissionSeeder extends Seeder
{
    public function run()
    {
        // 1. إدخال الصلاحيات (Permissions)
        $permissions = [
            ['id' => 1, 'name' => 'view products', 'guard_name' => 'api'],
            ['id' => 2, 'name' => 'create products', 'guard_name' => 'api'],
            ['id' => 3, 'name' => 'edit own products', 'guard_name' => 'api'],
            ['id' => 4, 'name' => 'edit any products', 'guard_name' => 'api'],
            ['id' => 5, 'name' => 'delete own products', 'guard_name' => 'api'],
            ['id' => 6, 'name' => 'delete any products', 'guard_name' => 'api'],
            ['id' => 7, 'name' => 'view categories', 'guard_name' => 'api'],
            ['id' => 8, 'name' => 'create categories', 'guard_name' => 'api'],
            ['id' => 9, 'name' => 'edit categories', 'guard_name' => 'api'],
            ['id' => 10, 'name' => 'delete categories', 'guard_name' => 'api'],
            ['id' => 11, 'name' => 'manage cart', 'guard_name' => 'api'],
            ['id' => 12, 'name' => 'view own orders', 'guard_name' => 'api'],
            ['id' => 13, 'name' => 'view all orders', 'guard_name' => 'api'],
            ['id' => 14, 'name' => 'update order status', 'guard_name' => 'api'],
            ['id' => 15, 'name' => 'view users list', 'guard_name' => 'api'],
            ['id' => 16, 'name' => 'view user details', 'guard_name' => 'api'],
            ['id' => 17, 'name' => 'create users', 'guard_name' => 'api'],
            ['id' => 18, 'name' => 'edit any user', 'guard_name' => 'api'],
            ['id' => 19, 'name' => 'delete user', 'guard_name' => 'api'],
            ['id' => 20, 'name' => 'manage permissions', 'guard_name' => 'api'],
            ['id' => 21, 'name' => 'view own profile', 'guard_name' => 'api'],
            ['id' => 22, 'name' => 'update own profile', 'guard_name' => 'api'],
        ];
        DB::table('permissions')->insert($permissions);

        // 2. إدخال الأدوار (Roles)
        $roles = [
            ['id' => 1, 'name' => 'admin', 'guard_name' => 'api'],
            ['id' => 2, 'name' => 'seller', 'guard_name' => 'api'],
            ['id' => 3, 'name' => 'customer', 'guard_name' => 'api'],
        ];
        DB::table('roles')->insert($roles);

        // 3. ربط الصلاحيات بالأدوار (Role Has Permissions)
        $rolePermissions = [
            // Admin (Role 1) - Has all permissions
            ...array_map(fn($id) => ['permission_id' => $id, 'role_id' => 1], range(1, 22)),
            // Seller (Role 2)
            ['permission_id' => 1, 'role_id' => 2], ['permission_id' => 2, 'role_id' => 2],
            ['permission_id' => 3, 'role_id' => 2], ['permission_id' => 5, 'role_id' => 2],
            ['permission_id' => 7, 'role_id' => 2], ['permission_id' => 12, 'role_id' => 2],
            ['permission_id' => 14, 'role_id' => 2], ['permission_id' => 21, 'role_id' => 2],
            ['permission_id' => 22, 'role_id' => 2],
            // Customer (Role 3)
            ['permission_id' => 1, 'role_id' => 3], ['permission_id' => 7, 'role_id' => 3],
            ['permission_id' => 11, 'role_id' => 3], ['permission_id' => 12, 'role_id' => 3],
            ['permission_id' => 21, 'role_id' => 3], ['permission_id' => 22, 'role_id' => 3],
        ];
        DB::table('role_has_permissions')->insert($rolePermissions);
    }
}