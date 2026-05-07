<?php

namespace App\Service;

use App\Dtos\UserDto;
use App\Models\User;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createUser(UserDto $userDto){
        return User::query()->create([
            'name' => $userDto->getName(),
            'email' => $userDto->getEmail(),
            'password' => $userDto->getPassword(),
            'phone_number' => $userDto->getPhoneNumber(),
        ]);
    }
}
