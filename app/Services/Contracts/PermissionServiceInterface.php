<?php

namespace App\Services\Contracts;

use App\Models\User;

interface PermissionServiceInterface
{
    /**
     * Assign the given roles to the user.
     *
     * @param  User  $user
     * @param  array<string>  $roles
     * @return void
     */
    public function assignRoles(User $user, array $roles): void;

    /**
     * Remove the given roles from the user.
     *
     * @param  User  $user
     * @param  array<string>  $roles
     * @return void
     */
    public function removeRoles(User $user, array $roles): void;

    /**
     * Sync the user's roles to exactly the given list.
     *
     * @param  User  $user
     * @param  array<string>  $roles
     * @return void
     */
    public function syncRoles(User $user, array $roles): void;
}
