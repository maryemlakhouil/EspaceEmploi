<x-app-layout>
    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

            @if (session('success'))
                <div class="p-4 rounded-lg bg-green-50 text-green-800 border border-green-200 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('info'))
                <div class="p-4 rounded-lg bg-blue-50 text-blue-800 border border-blue-200 shadow-sm">
                    {{ session('info') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <!-- LEFT: Profil principal -->
                <main class="lg:col-span-9 space-y-6">

                    <!-- Carte profil header -->
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                        <div class="h-24 bg-gradient-to-r from-blue-600 to-blue-400"></div>

                        <div class="p-8 -mt-12">
                            <div class="flex items-end gap-6">
                                <div class="w-32 h-32 rounded-full bg-white border-4 border-white shadow-md overflow-hidden flex-shrink-0">
                                    <img
                                        src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name='.$user->name }}"
                                        alt="{{ $user->name }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>

                                <div class="flex-1 mb-2">
                                    <h1 class="text-3xl font-bold text-gray-900">
                                        {{ $user->name }}
                                    </h1>

                                    <p class="text-lg text-gray-600 mt-2">
                                        {{ $user->specialite ?? 'Spécialité non renseignée' }}
                                    </p>

                                    <div class="flex gap-2 mt-4">
                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-semibold bg-blue-50 text-blue-700 rounded-lg border border-blue-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            Chercheur d'emploi
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- À propos -->
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2 mb-4">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            À propos
                        </h2>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $user->bio ?? 'Aucune bio disponible pour le moment.' }}
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-5 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Actions
                        </h3>

                        @if(auth()->id() !== $user->id)

                            @if(!$friendship)
                                {{-- Pas de relation => bouton envoyer --}}
                                <form method="POST" action="{{ route('friends.send', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Se connecter
                                    </button>
                                </form>

                            @elseif($friendship->status === 'pending' && $friendship->sender_id === auth()->id())
                                {{-- Moi j'ai envoyé => en attente --}}
                                <button disabled class="w-full sm:w-auto px-6 py-3 bg-gray-100 text-gray-600 font-semibold rounded-lg cursor-not-allowed border border-gray-200 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Invitation envoyée
                                </button>

                            @elseif($friendship->status === 'pending' && $friendship->receiver_id === auth()->id())
                                {{-- L'autre m'a envoyé => accepter/refuser --}}
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <form method="POST" action="{{ route('friends.accept', $friendship->id) }}" class="flex-1">
                                        @csrf
                                        <button type="submit" class="w-full px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200 shadow-sm flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Accepter
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('friends.reject', $friendship->id) }}" class="flex-1">
                                        @csrf
                                        <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-200 shadow-sm flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Refuser
                                        </button>
                                    </form>
                                </div>

                            @elseif($friendship->status === 'accepted')
                                {{-- Déjà connectés --}}
                                <button disabled class="w-full sm:w-auto px-6 py-3 bg-green-50 text-green-700 font-semibold rounded-lg cursor-not-allowed border border-green-200 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Connecté
                                </button>

                            @else
                                {{-- rejected ou autre --}}
                                <button disabled class="w-full sm:w-auto px-6 py-3 bg-gray-100 text-gray-600 font-semibold rounded-lg cursor-not-allowed border border-gray-200">
                                    Indisponible
                                </button>
                            @endif

                        @else
                            <a href="{{ route('profile.edit') }}" class="w-full sm:w-auto px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm inline-flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Éditer mon profil
                            </a>
                        @endif

                    </div>

                </main>

                <!-- RIGHT: Informations supplémentaires -->
                <aside class="lg:col-span-3 space-y-6">

                 
                    <!-- Statut -->
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="text-sm font-bold text-gray-900 flex items-center gap-2 mb-3">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m7 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Statut
                        </div>
                        <div class="px-3 py-2 bg-blue-50 text-blue-800 rounded-lg text-sm font-semibold text-center border border-blue-200">
                            Actif
                        </div>
                    </div>

                    <!-- Connexions -->
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="text-sm font-bold text-gray-900 flex items-center gap-2 mb-3">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a4 4 0 11-8 0m8 0H9m8-5v10a4 4 0 01-8 0v-10"></path>
                            </svg>
                            Réseau
                        </div>

                        @if(auth()->id() === $user->id)
                            <a href="{{ route('search.index') }}" class="block w-full px-4 py-2 bg-blue-50 text-blue-600 font-semibold rounded-lg hover:bg-blue-100 transition duration-200 text-center text-sm border border-blue-200">
                                Trouver des connexions
                            </a>
                        @else
                            <div class="text-sm text-gray-600">
                                @if($friendship && $friendship->status === 'accepted')
                                    Vous êtes connectés
                                @elseif($friendship && $friendship->status === 'pending')
                                    Invitation en attente
                                @else
                                    Non connectés
                                @endif
                            </div>
                        @endif
                    </div>

                </aside>

            </div>
        </div>
    </div>
</x-app-layout>
