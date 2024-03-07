<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\Login_Vertification;

 class LogInController extends Controller
{
    public function submit (Request $request)
    {
        //validate the phone number
        $request->validate ([
            'phone' => 'required|numeric|min:11'
        ]);
        //find or create a user model
        $user = User::firstOrCreate([
            'phone' => $request->phone
        ]);

        if (!$user) {
            return response()->json(['message' => 'Could not identify the phone number.'], 401);
        }
        //send the user a one-time use code
        $user->notify();
        //return back a response
    }
}
