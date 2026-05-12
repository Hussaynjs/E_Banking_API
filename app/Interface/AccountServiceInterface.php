<?php

namespace App\Interface;

use App\Dtos\UserDto;
use App\Models\Account;
use Illuminate\Database\Eloquent\Builder;

interface AccountServiceInterface
{
    public function modelQuery(): Builder;
    public function createAccountNumber(UserDto $userDto): Account;
    public function getAccountById(int $id): ?Account;
    public function getAccountByUserId(int $userId): ?Account;
    public function getAccountByAccountNumber(string $accountNumber): ?Account;
    public function getAccount(int|string $accountNumberOrUserId): ?Account;
}
