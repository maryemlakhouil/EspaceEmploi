<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOffer;
use App\Models\Application;

class ApplicationController extends Controller
{
    
     public function store(JobOffer $jobOffer)
    {
        $user = auth()->user();

        Application::firstOrCreate(
            ['user_id' => $user->id,'job_offer_id' => $jobOffer->id,],
            ['status' => 'en_attente',]
        );

        return back()->with('success', 'Candidature envoyée avec succès');
    }

}
