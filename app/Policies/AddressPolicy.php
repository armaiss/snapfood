<?php

namespace App\Policies;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddressPolicy
{
    public function myAddress(User $user, Address $address)
    {
        return $user->addresses->contains($address);
    }
}
