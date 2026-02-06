<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;

class RecruterController extends Controller
{
    public function applications()
    {
        $jobOffers = auth()->user()
            ->jobOffers()
            ->with('applications.user')
            ->get();

        return view('recruiter.applications', compact('jobOffers'));
    }


    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:accepte,refuse',
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Statut mis à jour avec succès');
    }


}
