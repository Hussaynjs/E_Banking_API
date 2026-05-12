<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function setupPin(Request $request, UserService $userService){
        // dd('reaching here');
        $validatedData = $request->validate([
            'pin' => 'required|string|min:4'
        ]);
        // dd('reaching here');
        //  dd($validatedData);
        $user = $userService->getUserById($request->user()->id);
        // dd($user);
        $userService->setupPin($user, $validatedData['pin']);
        
        return response()->json(['message' => 'pin setup successful']);


    }

    public function validatePin(Request $request, UserService $userService){
      $validatedData = $request->validate([
            'pin' => 'required|string|min:4'
        ]);
        // dd('reaching here');
        $isValid = $userService->verifyPin($request->user()->id, $validatedData['pin']);
        // dd($isValid);
        if(!$isValid){
            return response()->json(['message' => 'invalid pin'], 401);
        }

        return response()->json(['message' => 'pin is valid']);
        
    }
}
