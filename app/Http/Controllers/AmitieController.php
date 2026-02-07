<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amitie;
use App\Models\User;

class AmitieController extends Controller
{

    public function send(User $user)
    {
        if ($user->id === auth()->id()) return back();

        // Chercher si une relation existe déjà (dans les 2 sens)
        $existing = Amitie::where(function ($q) use ($user) {
            $q->where('sender_id', auth()->id())
              ->where('receiver_id', $user->id);
        })->orWhere(function ($q) use ($user) {
            $q->where('sender_id', $user->id)
              ->where('receiver_id', auth()->id());
        })->first();

        if ($existing) {
            return back()->with('info', 'Une demande existe déjà.');
        }

        Amitie::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Demande envoyée');
    }

    public function accept(Amitie $amitie)
    {
        $amitie->update(['status' => 'accepted']);
        return back();
    }

    public function reject(Amitie $amitie)
    {
        $amitie->update(['status' => 'rejected']);
        return back();
    }
}

