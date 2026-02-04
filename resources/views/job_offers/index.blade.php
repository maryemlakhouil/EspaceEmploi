<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Offres d’emploi
        </h2>
    </x-slot>
<form method="GET" action="{{ route('job-offers.index') }}" class="mb-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

        <input type="text" name="title" placeholder="Titre de l'offre"
               value="{{ request('title') }}"
               class="border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200">

        <select name="contract_type"
                class="border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-200">
            <option value="">-- Type de contrat --</option>
            <option value="CDI" @selected(request('contract_type')=='CDI')>CDI</option>
            <option value="CDD" @selected(request('contract_type')=='CDD')>CDD</option>
            <option value="Stage" @selected(request('contract_type')=='Stage')>Stage</option>
        </select>
        
        <button class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-2">
             Rechercher
        </button>

    </div>
</form>


@if($jobOffers->count())
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
@foreach($jobOffers as $offer)
    <div class="bg-white rounded-xl shadow-sm border p-6 hover:shadow-md transition">

        <div class="flex justify-between items-start">
            <h3 class="text-xl font-semibold text-gray-900">
                {{ $offer->title }}
            </h3>

            <span class="text-xs px-3 py-1 rounded-full bg-blue-100 text-blue-700">
                {{ $offer->contract_type }}
            </span>
        </div>

        <p class="mt-3 text-gray-600 text-sm">
            {{ Str::limit($offer->description, 120) }}
        </p>

        <div class="mt-4 flex justify-between items-center">
            <a href="{{ route('job_offers.show', $offer) }}"
               class="text-blue-600 font-medium hover:underline">
                Voir détails →
            </a>
        </div>

    </div>
@endforeach
</div>


    <div class="mt-6">
        {{ $jobOffers->links() }}
    </div>
@else
    <p>Aucune offre trouvée.</p>
@endif
</x-app-layout>
