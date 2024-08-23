<?php
use Illuminate\Support\Facades\Cache;

/**
 * Get roles
 *
 * @return array<string, int>|null Roles titles and ids
 */
/*function user_roles(): array|null
{
    return Cache::get('roles');
}*/

function user_roles(): array|null
{
    $roles = Cache::get('roles');
    if (!$roles) {
        // Fetch roles from the database or hardcode for testing
        $roles = [
            'admin' => 1,
            'user' => 2,
        ];
        Cache::put('roles', $roles);
    }
    return $roles;
}



/**
 * Determine if the user is admin
 *
 * @return bool True if user is admin, otherwise false
 */
/*function is_admin($roleId = null): bool
{
    $roles = user_roles();
    if ($roleId === null) {
        $roleId = auth()->user()?->role_id ?? -1;
    }

    return $roleId === 1;
}*/

function is_admin($roleId = null) : bool
{
    $roles = user_roles();

    if (!$roles || !isset($roles['admin'])) {
        // Handle the case where roles are not properly loaded
        return false; // Or throw an exception if this is a critical error
    }

    $adminId = $roles['admin'];

    if($roleId === null) {
        $roleId = auth()->user()?->role_id ?? -1;
    }

    return $adminId === $roleId;
}
