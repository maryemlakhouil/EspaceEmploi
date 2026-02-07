<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
      public function index()
    {
        $user = auth()->user();

        
        if ($user->hasRole('recruiter')) {
            return view('dashboard.recruiter');
        }

        if ($user->hasRole('chercheur')) {
            return view('dashboard.chercheur');
        }

        // fallback
        abort(403);
    }
}
