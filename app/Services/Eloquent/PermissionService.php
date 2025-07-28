<?php

namespace App\Services\Eloquent;

use App\Services\Contracts\PermissionServiceInterface;
use App\Models\User;

class PermissionService implements PermissionServiceInterface
{
    /**
     * Sync the user's roles to exactly the given list.
     *
     * @param  User  $user
     * @param  array<number>  $roles
     * @return void
     */
    public function syncRoles(User $user, array $roles): void
    {
        $user->permissions()->delete();

        foreach ($roles as $permissionName) {
            $user->permissions()->create([
                'permission' => $permissionName,
            ]);
        }
    }
}
