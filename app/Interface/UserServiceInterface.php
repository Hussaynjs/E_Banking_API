<?php

namespace App\Interface;

use App\Dtos\UserDto;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface UserServiceInterface
{
    public function createUser(UserDto $userDto): Model;
    public function setupPin(User $user, string $pin): void;
    public function verifyPin(int $userId, string $pin): bool;
    public function hasSetupPin(User $user): bool;
    public function getUserById(int $id): ?User;
}
