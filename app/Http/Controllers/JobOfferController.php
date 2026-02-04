<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function index(Request $request)
    {
        $query = JobOffer::query();

        if ($request->filled('title')) {
            $query->where('title', 'ilike', '%' . $request->title . '%');
        }

        if ($request->filled('type_contrat')) {
            $query->where('type_contrat', $request->type_contrat);
        }


        $jobOffers = $query->latest()->paginate(6)->withQueryString();

        return view('job_offers.index', compact('jobOffers'));
    }

    public function show(JobOffer $jobOffer)
    {
        return view('job_offers.show', compact('jobOffer'));
    }
}

