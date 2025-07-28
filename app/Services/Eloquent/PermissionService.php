<?php

namespace App\Services\Eloquent;

use App\Services\Contracts\PermissionServiceInterface;
use App\Models\User;

class PermissionService implements PermissionServiceInterface
{
    /**
     * Assign the given roles to the user.
     *
     * @param  User  $user
     * @param  array<string>  $roles
     * @return void
     */
    public function assignRoles(User $user, array $roles): void
    {
        $user->assignRole($roles);
    }

    /**
     * Remove the given roles from the user.
     *
     * @param  User  $user
     * @param  array<string>  $roles
     * @return void
     */
    public function removeRoles(User $user, array $roles): void
    {
        $user->removeRole($roles);
    }

    /**
     * Sync the user's roles to exactly the given list.
     *
     * @param  User  $user
     * @param  array<string>  $roles
     * @return void
     */
    public function syncRoles(User $user, array $roles): void
    {
        $user->syncRoles($roles);
    }
}
