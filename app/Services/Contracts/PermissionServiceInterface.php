<?php

namespace App\Services\Contracts;

use App\Models\User;

interface PermissionServiceInterface
{
    /**
     * Sync the user's roles to exactly the given list.
     *
     * @param  User  $user
     * @param  array<string>  $roles
     * @return void
     */
    public function syncRoles(User $user, array $roles): void;
}
