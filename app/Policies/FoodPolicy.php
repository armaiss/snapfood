<?php


namespace App\Policies;

use App\Models\Food;
use App\Models\User;

class FoodPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
      return $user->can('viewAny-foods');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Food $food): bool
    {
        return $user->can('view-food')&&($user->restaurant->id==$food->restaurant_id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-food');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Food $food): bool
    {
        return $user->can('update-food')&&($user->restaurant->id==$food->restaurant_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Food $food): bool
    {
        return $user->can('update-food')&&($user->restaurant->id==$food->restaurant_id);
    }

    /**
     * Determine whether the user can restore the model.
     */

}
