<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_country","view_any_country","create_country","update_country","restore_country","restore_any_country","replicate_country","reorder_country","delete_country","delete_any_country","force_delete_country","force_delete_any_country","view_coupon","view_any_coupon","create_coupon","update_coupon","restore_coupon","restore_any_coupon","replicate_coupon","reorder_coupon","delete_coupon","delete_any_coupon","force_delete_coupon","force_delete_any_coupon","view_event::model","view_any_event::model","create_event::model","update_event::model","restore_event::model","restore_any_event::model","replicate_event::model","reorder_event::model","delete_event::model","delete_any_event::model","force_delete_event::model","force_delete_any_event::model","view_event::review","view_any_event::review","create_event::review","update_event::review","restore_event::review","restore_any_event::review","replicate_event::review","reorder_event::review","delete_event::review","delete_any_event::review","force_delete_event::review","force_delete_any_event::review","view_member","view_any_member","create_member","update_member","restore_member","restore_any_member","replicate_member","reorder_member","delete_member","delete_any_member","force_delete_member","force_delete_any_member","view_payment::order","view_any_payment::order","create_payment::order","update_payment::order","restore_payment::order","restore_any_payment::order","replicate_payment::order","reorder_payment::order","delete_payment::order","delete_any_payment::order","force_delete_payment::order","force_delete_any_payment::order","view_shield::role","view_any_shield::role","create_shield::role","update_shield::role","delete_shield::role","delete_any_shield::role","view_subscriber","view_any_subscriber","create_subscriber","update_subscriber","restore_subscriber","restore_any_subscriber","replicate_subscriber","reorder_subscriber","delete_subscriber","delete_any_subscriber","force_delete_subscriber","force_delete_any_subscriber","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"panel_user","guard_name":"web","permissions":[]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
