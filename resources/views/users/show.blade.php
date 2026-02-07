<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Profil utilisateur
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6">
        <!-- Carte profil -->
        <div class="bg-white shadow rounded-lg p-6">
            <!-- Header -->
            <div class="flex items-center gap-6">
                <img
                    src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://ui-avatars.com/api/?name='.$user->name }}"
                    class="w-28 h-28 rounded-full object-cover border"
                >

                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-800">
                        {{ $user->name }}
                    </h3>

                    <p class="text-gray-600 mt-1">
                        {{ $user->specialite ?? 'Spécialité non renseignée' }}
                    </p>

                    <span class="inline-block mt-2 px-3 py-1 text-sm bg-blue-100 text-blue-700 rounded-full">
                        Chercheur d’emploi
                    </span>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t my-6"></div>

            <!-- Bio -->
            <div>
                <h4 class="font-semibold text-gray-800 mb-2">À propos</h4>
                <p class="text-gray-700 leading-relaxed">
                    {{ $user->bio ?? 'Aucune bio disponible pour le moment.' }}
                </p>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex gap-4">
                <button class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Contacter
                </button>

                <button class="px-5 py-2 border rounded text-gray-700 hover:bg-gray-100 transition">
                    Enregistrer le profil
                </button>
            </div>
        @if (session('success'))
    <div class="mb-3 p-3 rounded bg-green-100 text-green-800">
        {{ session('success') }}
    </div>
@endif

@if (session('info'))
    <div class="mb-3 p-3 rounded bg-blue-100 text-blue-800">
        {{ session('info') }}
    </div>
@endif

@if(auth()->id() !== $user->id)

    @if(!$friendship)
        {{-- Pas de relation => bouton envoyer --}}
        <form method="POST" action="{{ route('friends.send', $user->id) }}">
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Se connecter
            </button>
        </form>

    @elseif($friendship->status === 'pending' && $friendship->sender_id === auth()->id())
        {{-- Moi j’ai envoyé => en attente --}}
        <button disabled class="bg-gray-300 text-gray-700 px-4 py-2 rounded cursor-not-allowed">
            Invitation envoyée 
        </button>

    @elseif($friendship->status === 'pending' && $friendship->receiver_id === auth()->id())
        {{-- L’autre m’a envoyé => accepter/refuser --}}
        <div class="flex gap-2">
            <form method="POST" action="{{ route('friends.accept', $friendship->id) }}">
                @csrf
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Accepter</button>
            </form>

            <form method="POST" action="{{ route('friends.reject', $friendship->id) }}">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Refuser</button>
            </form>
        </div>

    @elseif($friendship->status === 'accepted')
        {{-- Déjà connectés --}}
        <button disabled class="bg-green-100 text-green-800 px-4 py-2 rounded cursor-not-allowed">
            Connecté
        </button>

    @else
        {{-- rejected ou autre --}}
        <button disabled class="bg-gray-200 text-gray-700 px-4 py-2 rounded cursor-not-allowed">
            Indisponible
        </button>
    @endif

@endif



        </div>
    </div>
</x-app-layout>
