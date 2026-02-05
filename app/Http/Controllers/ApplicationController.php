<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(JobOffer $jobOffer)
    {
        auth()->user()->jobOffers()->firstOrCreate(
            ['job_offer_id' => $jobOffer->id],
            ['status' => 'en_attente']
        );

        return back()->with('success', 'Candidature envoyée avec succès');
    }

}
