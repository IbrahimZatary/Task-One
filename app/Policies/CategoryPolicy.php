<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Both admin and super admin can view 
        return in_array($user->role, ['admin', 'super_admin']);
    }

    
    public function view(User $user, Category $category): bool
    {
        // Only super_admin can view category details 
        return $user->isSuperAdmin();
    }

    
    public function create(User $user): bool
    {
        return $user->isSuperAdmin();
    }

    
    public function update(User $user, Category $category): bool
    {
        return $user->isSuperAdmin();
    }

   
    public function delete(User $user, Category $category): bool
    {
        return $user->isSuperAdmin();
    }
}