<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\Request;

class OnboardingController extends Controller
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
}
