<?php

namespace App\Service;

use App\Dtos\UserDto;
use App\Interface\UserServiceInterface;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Override;

use function Laravel\Prompts\error;

class UserService implements UserServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    // public function createUser(UserDto $userDto){
    //     return User::query()->create([
    //         'name' => $userDto->getName(),
    //         'email' => $userDto->getEmail(),
    //         'password' => $userDto->getPassword(),
    //         'phone_number' => $userDto->getPhoneNumber(),
    //         'pin' => bcrypt($userDto->getPin()),
    //     ]);
    // }

    #[Override]
    public function createUser(UserDto $userDto): Model
    {
        return User::query()->create([
            'name' => $userDto->getName(),
            'email' => $userDto->getEmail(),
            'password' => $userDto->getPassword(),
            'phone_number' => $userDto->getPhoneNumber(),
            'pin' => Hash::make($userDto->getPin()),
        ]);
    }

    #[Override]
    public function setupPin(User $user, string $pin): void
    {
        if($this->hasSetupPin($user)){
           throw new Exception('user already has a pin setup');
        }
        $user->pin = Hash::make($pin);
    }

    #[Override]
    public function verifyPin(int $userId, string $pin): bool
    {
        $user = $this->getUserById($userId);
        if (!$user) {
            throw new Exception('user not found');
        }
        return Hash::check($pin, $user->pin);
    }
    #[Override]
    public function hasSetupPin(User $user): bool
    {
        return  !is_null($user->pin);
    }

    #[Override]
    public function getUserById(int $id): ?User
    {
        $user = User::query()->where('id', $id)->first();
        if (!$user) {
            throw new Exception('user not found');
        }
        return $user;
    }
}
