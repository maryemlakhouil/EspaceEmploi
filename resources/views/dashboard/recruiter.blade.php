<x-app-layout>
    <div class="bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">

            {{-- Flash messages --}}
            @if (session('success'))
                <div class="p-4 rounded-xl bg-green-100 text-green-800 border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 rounded-xl bg-red-100 text-red-800 border border-red-200">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                {{-- LEFT: Profil + menu --}}
                <aside class="lg:col-span-3 space-y-4">
                    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
                        <div class="h-16 bg-gradient-to-r from-indigo-600 to-indigo-400"></div>

                        <div class="p-4 -mt-8">
                            <div class="w-16 h-16 rounded-full bg-white border-4 border-white shadow-sm flex items-center justify-center overflow-hidden">
                                <span class="text-xl font-bold text-indigo-700">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                            </div>

                            <div class="mt-3">
                                <div class="text-lg font-bold text-gray-800">
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="text-sm text-gray-500">Recruteur</div>
                                <div class="text-xs text-gray-400 mt-1">Mon user_id: {{ auth()->id() }}</div>
                            </div>

                            <div class="mt-4 space-y-2">
                                <a href="{{ route('job-offers.create') }}"
                                   class="block w-full text-center px-4 py-2 rounded-full bg-indigo-600 text-white hover:bg-indigo-700">
                                    Créer une offre
                                </a>

                                <a href="{{ route('job-offers.index') }}"
                                   class="block w-full text-center px-4 py-2 rounded-full border hover:bg-gray-50">
                                    Mes offres
                                </a>

                                <a href="{{ route('recruiter.applications') }}"
                                   class="block w-full text-center px-4 py-2 rounded-full border hover:bg-gray-50">
                                    Candidatures
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border p-4">
                        <div class="text-sm font-semibold text-gray-800">Raccourcis</div>
                        <div class="mt-3 space-y-2 text-sm">
                            <a class="block px-3 py-2 rounded-lg hover:bg-gray-50" href="{{ route('job-offers.create') }}">
                                + Nouvelle offre
                            </a>
                            <a class="block px-3 py-2 rounded-lg hover:bg-gray-50" href="{{ route('job-offers.index') }}">
                                Gérer mes offres
                            </a>
                            <a class="block px-3 py-2 rounded-lg hover:bg-gray-50" href="{{ route('recruiter.applications') }}">
                                Voir candidatures
                            </a>
                        </div>
                    </div>
                </aside>

                {{-- CENTER: Actions principales --}}
                <main class="lg:col-span-6 space-y-4">

                    {{-- Carte “composer” style LinkedIn --}}
                    <div class="bg-white rounded-2xl shadow-sm border p-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center font-bold text-gray-600">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>

                            <div class="flex-1">
                                <div class="text-sm text-gray-600">
                                    Prêt à publier une nouvelle annonce ?
                                </div>

                                <div class="mt-3 flex flex-wrap gap-2">
                                    <a href="{{ route('job-offers.create') }}"
                                       class="px-4 py-2 rounded-full bg-indigo-600 text-white hover:bg-indigo-700">
                                        Créer une offre
                                    </a>

                                    <a href="{{ route('job-offers.index') }}"
                                       class="px-4 py-2 rounded-full border hover:bg-gray-50">
                                        Voir mes offres
                                    </a>

                                    <a href="{{ route('recruiter.applications') }}"
                                       class="px-4 py-2 rounded-full border hover:bg-gray-50">
                                        Candidatures reçues
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Cartes de navigation (tes mêmes 3 options) --}}
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <a href="{{ route('job-offers.create') }}"
                           class="bg-white rounded-2xl shadow-sm border p-4 hover:bg-gray-50">
                            <div class="text-sm text-gray-500">Action</div>
                            <div class="mt-1 text-base font-bold text-gray-800">Créer une offre</div>
                            <div class="mt-2 text-sm text-gray-600">
                                Titre, description, contrat, entreprise, image.
                            </div>
                        </a>

                        <a href="{{ route('job-offers.index') }}"
                           class="bg-white rounded-2xl shadow-sm border p-4 hover:bg-gray-50">
                            <div class="text-sm text-gray-500">Gestion</div>
                            <div class="mt-1 text-base font-bold text-gray-800">Mes offres</div>
                            <div class="mt-2 text-sm text-gray-600">
                                Modifier, clôturer, suivre l’état.
                            </div>
                        </a>

                        <a href="{{ route('recruiter.applications') }}"
                           class="bg-white rounded-2xl shadow-sm border p-4 hover:bg-gray-50">
                            <div class="text-sm text-gray-500">Suivi</div>
                            <div class="mt-1 text-base font-bold text-gray-800">Candidatures</div>
                            <div class="mt-2 text-sm text-gray-600">
                                Voir les candidats pour vos offres.
                            </div>
                        </a>
                    </div>

                    {{-- Zone “feed” placeholder (design seulement) --}}
                    <div class="bg-white rounded-2xl shadow-sm border p-4">
                        <div class="flex items-center justify-between">
                            <div class="text-sm font-semibold text-gray-800">Activité</div>
                            <span class="text-xs text-gray-400">Aperçu</span>
                        </div>

                        <div class="mt-4 space-y-3">
                            <div class="p-3 rounded-xl bg-gray-50 border">
                                <div class="text-sm text-gray-700 font-semibold">Astuce</div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Utilise un titre précis + un type de contrat clair pour augmenter la qualité des candidatures.
                                </div>
                            </div>

                            <div class="p-3 rounded-xl bg-gray-50 border">
                                <div class="text-sm text-gray-700 font-semibold">Raccourci</div>
                                <div class="text-sm text-gray-600 mt-1">
                                    Tu peux gérer toutes tes annonces depuis “Mes offres”.
                                </div>
                            </div>
                        </div>
                    </div>

                </main>

                {{-- RIGHT: Panneaux info --}}
                <aside class="lg:col-span-3 space-y-4">
                    <div class="bg-white rounded-2xl shadow-sm border p-4">
                        <div class="text-sm font-semibold text-gray-800">À faire</div>
                        <ul class="mt-3 space-y-2 text-sm text-gray-700">
                            <li class="flex gap-2">
                                <span class="mt-1 w-2 h-2 rounded-full bg-indigo-600"></span>
                                Publier au moins 1 offre
                            </li>
                            <li class="flex gap-2">
                                <span class="mt-1 w-2 h-2 rounded-full bg-indigo-600"></span>
                                Vérifier les candidatures reçues
                            </li>
                            <li class="flex gap-2">
                                <span class="mt-1 w-2 h-2 rounded-full bg-indigo-600"></span>
                                Clôturer les offres expirées
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

<div class="bg-white rounded-2xl shadow-sm border p-4">
    <div class="flex items-center justify-between">
        <div class="text-sm font-semibold text-gray-800">Réseau</div>
        <a href="{{ route('search.index') }}" class="text-xs text-indigo-600 hover:underline">Trouver</a>
    </div>

    {{-- Demandes reçues --}}
    <div class="mt-4">
        <div class="text-xs font-semibold text-gray-700 uppercase tracking-wide">
            Demandes reçues
        </div>

        @if($pendingRequests->isEmpty())
            <div class="mt-2 text-sm text-gray-600">
                Aucune demande en attente.
            </div>
        @else
            <div class="mt-3 space-y-3">
                @foreach($pendingRequests as $req)
                    <div class="flex items-center justify-between gap-2 p-3 rounded-xl bg-gray-50 border">
                        <div class="min-w-0">
                            <div class="text-sm font-semibold text-gray-800 truncate">
                                {{ $req->sender?->name ?? 'Utilisateur' }}
                            </div>
                            <div class="text-xs text-gray-500">Invitation</div>
                        </div>

                        <div class="flex items-center gap-2">
                            <form method="POST" action="{{ route('friends.accept', $req->id) }}">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 rounded-full bg-green-600 text-white text-xs hover:bg-green-700">
                                    Accepter
                                </button>
                            </form>

                            <form method="POST" action="{{ route('friends.reject', $req->id) }}">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-1 rounded-full bg-red-600 text-white text-xs hover:bg-red-700">
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
    <div class="mt-6">
        <div class="text-xs font-semibold text-gray-700 uppercase tracking-wide">
            Mes connexions
        </div>

        @if($friends->isEmpty())
            <div class="mt-2 text-sm text-gray-600">
                Aucune connexion pour le moment.
            </div>
        @else
            <div class="mt-3 space-y-2">
                @foreach($friends as $a)
                    @php
                        $other = ($a->sender_id === $authId) ? $a->receiver : $a->sender;
                    @endphp

                    <a href="{{ $other ? route('users.show', $other->id) : '#' }}"
                       class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 border">
                        <div class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center font-bold text-gray-600">
                            {{ $other? strtoupper(substr($other->name,0,1)) : '?' }}
                        </div>

                        <div class="min-w-0">
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
