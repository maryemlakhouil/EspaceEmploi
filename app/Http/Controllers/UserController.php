<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
        
    public function show(User $user)
    {
        $authId = auth()->id();

        $friendship = null;
        if ($authId) {
            $friendship = Amitie::where(function ($q) use ($authId, $user) {
                $q->where('sender_id', $authId)->where('receiver_id', $user->id);
            })->orWhere(function ($q) use ($authId, $user) {
                $q->where('sender_id', $user->id)->where('receiver_id', $authId);
            })->first();
        }

        return view('users.show', compact('user', 'friendship'));
    }

}
