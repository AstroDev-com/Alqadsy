<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CheckUsers extends Command
{
    protected $signature = 'check:users';
    protected $description = 'Check users and their roles in the database';

    public function handle()
    {
        $this->info('Checking users in database...');

        $users = User::with('roles')->get();

        if ($users->isEmpty()) {
            $this->error('No users found in the database!');
            $this->info('Please run: php artisan migrate:fresh --seed');
            return;
        }

        $this->table(
            ['ID', 'Name', 'Email', 'Roles'],
            $users->map(function ($user) {
                return [
                    $user->id,
                    $user->name,
                    $user->email,
                    $user->roles->pluck('name')->join(', ')
                ];
            })
        );

        $this->info('Checking roles in database...');
        $roles = Role::all();

        $this->table(
            ['ID', 'Name'],
            $roles->map(function ($role) {
                return [$role->id, $role->name];
            })
        );

        // Check and create necessary permissions
        $this->info('Checking permissions...');
        $requiredPermissions = [
            'view_permissions',
            'create_permissions',
            'edit_permissions',
            'delete_permissions'
        ];

        foreach ($requiredPermissions as $permission) {
            if (!Permission::query()->where(['name' => $permission])->exists()) {
                Permission::create(['name' => $permission, 'guard_name' => 'web']);
                $this->info("Created permission: {$permission}");
            }
        }

        // Assign permissions to admin role
        $adminRole = Role::query()->where(['name' => 'admin'])->first();
        if ($adminRole) {
            $adminRole->givePermissionTo($requiredPermissions);
            $this->info('Assigned permissions to admin role');
        }
    }
}
