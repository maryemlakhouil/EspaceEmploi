<x-app-layout>
    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

            {{-- Flash messages --}}
            @if (session('success'))
                <div class="p-4 rounded-lg bg-green-50 text-green-800 border border-green-200 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 rounded-lg bg-red-50 text-red-800 border border-red-200 shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                {{-- LEFT: Profil + menu --}}
                <aside class="lg:col-span-3 space-y-5">
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                        <div class="h-20 bg-gradient-to-r from-blue-600 to-blue-400"></div>

                        <div class="p-6 -mt-10">
                            <div class="w-20 h-20 rounded-full bg-white border-4 border-white shadow-md flex items-center justify-center overflow-hidden">
                                <span class="text-2xl font-bold text-blue-600">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                            </div>

                            <div class="mt-4">
                                <div class="text-lg font-bold text-gray-900">
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="text-sm text-gray-600 mt-1">Recruteur</div>
                                <div class="text-xs text-gray-500 mt-2">ID: {{ auth()->id() }}</div>
                            </div>

                            <div class="mt-6 space-y-3">
                                <a href="{{ route('job-offers.create') }}"
                                   class="block w-full text-center px-4 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition duration-200 shadow-sm">
                                    Créer une offre
                                </a>

                                <a href="{{ route('job-offers.index') }}"
                                   class="block w-full text-center px-4 py-3 rounded-lg border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition duration-200">
                                    Mes offres
                                </a>

                                <a href="{{ route('recruiter.applications') }}"
                                   class="block w-full text-center px-4 py-3 rounded-lg border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition duration-200">
                                    Candidatures
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="text-sm font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.658 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                            Raccourcis
                        </div>
                        <div class="mt-4 space-y-2 text-sm">
                            <a class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" href="{{ route('job-offers.create') }}">
                                + Nouvelle offre
                            </a>
                            <a class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" href="{{ route('job-offers.index') }}">
                                Gérer mes offres
                            </a>
                            <a class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" href="{{ route('recruiter.applications') }}">
                                Voir candidatures
                            </a>
                        </div>
                    </div>
                </aside>

                {{-- CENTER: Actions principales --}}
                <main class="lg:col-span-6 space-y-5">                   

                    {{-- Cartes de navigation (tes mêmes 3 options) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <a href="{{ route('job-offers.create') }}"
                           class="bg-white rounded-lg shadow-md border border-gray-200 p-5 hover:shadow-lg hover:border-blue-300 transition duration-200 group">
                            <div class="flex items-center gap-3 mb-3">
                               
                            </div>
                            <div class="mt-2 text-base font-bold text-gray-900">Créer une offre</div>
                            <div class="mt-2 text-sm text-gray-600">
                                Titre, description, contrat, entreprise.
                            </div>
                        </a>

                        <a href="{{ route('job-offers.index') }}"
                           class="bg-white rounded-lg shadow-md border border-gray-200 p-5 hover:shadow-lg hover:border-green-300 transition duration-200 group">
                           
                            <div class="mt-2 text-base font-bold text-gray-900">Mes offres</div>
                            <div class="mt-2 text-sm text-gray-600">
                                Modifier, clôturer, suivre l'état.
                            </div>
                        </a>

                        <a href="{{ route('recruiter.applications') }}"
                           class="bg-white rounded-lg shadow-md border border-gray-200 p-5 hover:shadow-lg hover:border-purple-300 transition duration-200 group">
                            <div class="flex items-center gap-3 mb-3">
                                
                            </div>
                            <div class="mt-2 text-base font-bold text-gray-900">Candidatures</div>
                            <div class="mt-2 text-sm text-gray-600">
                                Voir les candidats pour vos offres.
                            </div>
                        </a>
                    </div>

                    {{-- Zone "feed" placeholder (design seulement) --}}
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="flex items-center justify-between mb-5">
                            <div class="text-base font-bold text-gray-900 flex items-center gap-2">
                                
                                Activité
                            </div>
                            <span class="text-xs text-gray-500">Conseils</span>
                        </div>

                        <div class="space-y-3">
                            <div class="p-4 rounded-lg bg-blue-50 border border-blue-100">
                                <div class="text-sm font-semibold text-blue-900 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2z" clip-rule="evenodd"></path>
                                    </svg>
                                    Astuce
                                </div>
                                <div class="text-sm text-blue-800 mt-2">
                                    Utilise un titre précis + un type de contrat clair pour augmenter la qualité des candidatures.
                                </div>
                            </div>

                            <div class="p-4 rounded-lg bg-green-50 border border-green-100">
                                <div class="text-sm font-semibold text-green-900 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 3.062v2.332A6 6 0 0012 14.27V3.455z" clip-rule="evenodd"></path>
                                    </svg>
                                    Raccourci
                                </div>
                                <div class="text-sm text-green-800 mt-2">
                                    Tu peux gérer toutes tes annonces depuis "Mes offres".
                                </div>
                            </div>
                        </div>
                    </div>

                </main>

                {{-- RIGHT: Panneaux info --}}
                <aside class="lg:col-span-3 space-y-5">
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            À faire
                        </div>
                        <ul class="mt-4 space-y-3 text-sm text-gray-700">
                            <li class="flex gap-3 items-start">
                                <span class="mt-1.5 w-2 h-2 rounded-full bg-blue-600 flex-shrink-0"></span>
                                <span>Publier au moins 1 offre</span>
                            </li>
                            <li class="flex gap-3 items-start">
                                <span class="mt-1.5 w-2 h-2 rounded-full bg-blue-600 flex-shrink-0"></span>
                                <span>Vérifier les candidatures reçues</span>
                            </li>
                            <li class="flex gap-3 items-start">
                                <span class="mt-1.5 w-2 h-2 rounded-full bg-blue-600 flex-shrink-0"></span>
                                <span>Clôturer les offres expirées</span>
                            </li>
                        </ul>
                    </div>

                   @php
    $authId = auth()->id();

    $pendingRequests = \App\Models\Amitie::with('sender')
        ->where('receiver_id', $authId)
        ->where('status', 'pending')
        ->latest()
        ->take(5)
        ->get();

    $friends = \App\Models\Amitie::with(['sender','receiver'])
        ->where('status', 'accepted')
        ->where(function ($q) use ($authId) {
            $q->where('sender_id', $authId)
              ->orWhere('receiver_id', $authId);
        })
        ->latest()
        ->take(8)
        ->get();
@endphp

<div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
    <div class="flex items-center justify-between mb-4">
        <div class="text-base font-bold text-gray-900 flex items-center gap-2">
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a4 4 0 11-8 0m8 0H9m8-5v10a4 4 0 01-8 0v-10"></path>
            </svg>
            Réseau
        </div>
        <a href="{{ route('search.index') }}" class="text-xs text-blue-600 hover:text-blue-700 font-semibold">Trouver</a>
    </div>

    {{-- Demandes reçues --}}
    <div class="border-b border-gray-200 pb-4 mb-4">
        <div class="text-xs font-bold text-gray-700 uppercase tracking-wide mb-3">
            Demandes reçues
        </div>

        @if($pendingRequests->isEmpty())
            <div class="text-sm text-gray-600">
                Aucune demande en attente.
            </div>
        @else
            <div class="space-y-3">
                @foreach($pendingRequests as $req)
                    <div class="flex items-center justify-between gap-2 p-3 rounded-lg bg-gray-50 border border-gray-100">
                        <div class="min-w-0">
                            <div class="text-sm font-semibold text-gray-800 truncate">
                                {{ $req->sender?->name ?? 'Utilisateur' }}
                            </div>
                            <div class="text-xs text-gray-500">Invitation</div>
                        </div>

                        <div class="flex items-center gap-1 flex-shrink-0">
                            <form method="POST" action="{{ route('friends.accept', $req->id) }}">
                                @csrf
                                <button type="submit"
                                    class="px-2 py-1 rounded-lg bg-green-600 text-white text-xs hover:bg-green-700 transition duration-200">
                                    Accepter
                                </button>
                            </form>

                            <form method="POST" action="{{ route('friends.reject', $req->id) }}">
                                @csrf
                                <button type="submit"
                                    class="px-2 py-1 rounded-lg bg-red-600 text-white text-xs hover:bg-red-700 transition duration-200">
                                    Refuser
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Amis / Connexions --}}
    <div>
        <div class="text-xs font-bold text-gray-700 uppercase tracking-wide mb-3">
            Mes connexions
        </div>

        @if($friends->isEmpty())
            <div class="text-sm text-gray-600">
                Aucune connexion pour le moment.
            </div>
        @else
            <div class="space-y-2">
                @foreach($friends as $a)
                    @php
                        $other = ($a->sender_id === $authId) ? $a->receiver : $a->sender;
                    @endphp

                    <a href="{{ $other ? route('users.show', $other->id) : '#' }}"
                       class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 border border-gray-100 transition duration-200">
                        <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600 flex-shrink-0">
                            {{ $other? strtoupper(substr($other->name,0,1)) : '?' }}
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="text-sm font-semibold text-gray-800 truncate">
                                {{ $other->name ?? 'Utilisateur' }}
                            </div>
                            <div class="text-xs text-gray-500 truncate">Connexion</div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>

                </aside>



            </div>
        </div>
    </div>
</x-app-layout>
