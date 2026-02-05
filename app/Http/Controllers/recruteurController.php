<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class recruteurController extends Controller
{
    public function applications()
    {
        $applications = Application::whereHas('jobOffer', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->with(['user', 'jobOffer'])
        ->get();

        return view('recruiter.applications', compact('applications'));
    }
}
