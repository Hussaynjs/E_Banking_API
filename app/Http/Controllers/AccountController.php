<?php

namespace App\Http\Controllers;

use App\Dtos\UserDto;
use App\Service\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct( private readonly AccountService $account_service)
    {
        //
    }

    public function store(Request $request){
        $userDto = UserDto::fromModel($request->user());
        // dd($user);
        $account =  $this->account_service->createAccountNumber($userDto);
        // dd($account);
        return response()->json(['message' => 'hello ' . $request->user()->name . ', your account has been created successfully', 'account_number' => $account->account_number, 'user' => $request->user()]);
    }
}
