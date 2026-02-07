<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Dashboard Recruteur</h2>

            {{-- Action principale --}}
            <a href="{{ route('job-offers.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
                + Créer une offre
            </a>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto p-6 space-y-6">

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="p-4 rounded bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 rounded bg-red-100 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        {{-- Carte bienvenue --}}
        <div class="bg-white p-6 rounded-xl shadow border">
            <h3 class="text-2xl font-bold text-gray-800">
                Bienvenue {{ auth()->user()->name }}
            </h3>
            <p class="text-gray-600 mt-2">
                Gérez vos offres, suivez les candidatures et clôturez les annonces.
            </p>

            <div class="mt-4 flex flex-wrap gap-3">
                <a href="{{ route('job-offers.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Créer une offre
                </a>

                <a href="{{ route('job-offers.index') }}"
                   class="px-4 py-2 border rounded-lg hover:bg-gray-50">
                    Mes offres
                </a>

                <a href="{{ route('recruiter.applications') }}"
                   class="px-4 py-2 border rounded-lg hover:bg-gray-50">
                    Candidatures reçues
                </a>
            </div>
        </div>

        {{-- Raccourcis --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('job-offers.create') }}"
               class="block bg-white p-5 rounded-xl shadow border hover:bg-gray-50">
                <h4 class="text-lg font-bold text-gray-800">Créer une offre</h4>
                <p class="text-gray-600 mt-1">Titre, description, contrat, entreprise, image.</p>
            </a>

            <a href="{{ route('job-offers.index') }}"
               class="block bg-white p-5 rounded-xl shadow border hover:bg-gray-50">
                <h4 class="text-lg font-bold text-gray-800">Mes offres</h4>
                <p class="text-gray-600 mt-1">Voir / modifier / clôturer.</p>
            </a>

            <a href="{{ route('recruiter.applications') }}"
               class="block bg-white p-5 rounded-xl shadow border hover:bg-gray-50">
                <h4 class="text-lg font-bold text-gray-800">Candidatures reçues</h4>
                <p class="text-gray-600 mt-1">Voir les candidats sur vos offres.</p>
            </a>
        </div>

        {{-- Optionnel: intégrer Livewire "liste de mes offres" directement ici --}}
        {{-- <div class="bg-white p-6 rounded-xl shadow border">
            <h4 class="text-lg font-bold mb-3">Mes offres</h4>
            @livewire('recruiter.offers-index')
        </div> --}}

    </div>
</x-app-layout>
