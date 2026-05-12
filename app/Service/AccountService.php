<?php

namespace App\Service;

use App\Dtos\UserDto;
use App\Interface\AccountServiceInterface;
use App\Models\Account;
use Illuminate\Database\Eloquent\Builder;
use Override;

class AccountService implements AccountServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct( )
    {
        //
    }

    #[Override]
    public function modelQuery(): Builder
    {
        return Account::query();
    }

    #[Override]
    public function createAccountNumber(UserDto $userDto): Account
    {
        return $this->modelQuery()->create([
            'account_number' => substr($userDto->getPhoneNumber(), -10),
            'user_id' => $userDto->getId()
        ]);
       
    }

    #[Override]
    public function getAccount(int|string $accountNumberOrUserId): ?Account
    {
        throw new \Exception('Not implemented');
    }

    #[Override]
    public function getAccountByAccountNumber(string $accountNumber): ?Account
    {
        throw new \Exception('Not implemented');
    }

    #[Override]
    public function getAccountById(int $id): ?Account
    {
        throw new \Exception('Not implemented');
    }

    #[Override]
    public function getAccountByUserId(int $userId): ?Account
    {
        throw new \Exception('Not implemented');
    }
}
