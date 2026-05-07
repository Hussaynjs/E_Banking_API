<?php

namespace App\Http\Controllers;

use App\Dtos\UserDto;
use App\Http\Requests\RegisterUserRequest;
use App\Service\UserService;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function __construct(private readonly UserService $user_service)
    {
        //
    }

    public function register(RegisterUserRequest $request){
        $userDto = UserDto::formApiRequest($request);
        $user = $this->user_service->createUser($userDto);
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'user' => $user
        ]);

    }
}
