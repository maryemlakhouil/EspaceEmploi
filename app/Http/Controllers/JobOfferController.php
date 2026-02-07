<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreJobOfferRequest;
use App\Http\Requests\UpdateJobOfferRequest;

class JobOfferController extends Controller
{
    public function index(Request $request)
    {
     $query = JobOffer::where('user_id', auth()->id()); 

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
        $hasApplied = auth()->check()
            ? $jobOffer->applications()
                ->where('user_id', auth()->id())
                ->exists()
            : false;

        return view('job_offers.show', compact('jobOffer', 'hasApplied'));
    }

    public function store(StoreJobOfferRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['is_closed'] = false;

        $data['image'] = $request->file('image')->store('job_offers', 'public');

        JobOffer::create($data);

        return redirect()->route('dashboard')->with('success', 'Offre créée');
    }

    public function update(UpdateJobOfferRequest $request, JobOffer $jobOffer)
    {
        $this->authorize('update', $jobOffer);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($jobOffer->image);
            $data['image'] = $request->file('image')->store('job_offers', 'public');
        }

        $jobOffer->update($data);

        return back()->with('success', 'Offre mise à jour');
    }


    public function close(JobOffer $jobOffer)
    {
        $this->authorize('close', $jobOffer);

        $jobOffer->update(['is_closed' => true]);

        return back()->with('success', 'Offre clôturée');
    }

    public function create()
    {
        return view('job_offers.create');
    }

    public function edit(JobOffer $jobOffer)
    {
        $this->authorize('update', $jobOffer);

        return view('job_offers.edit', compact('jobOffer'));
    }


}

