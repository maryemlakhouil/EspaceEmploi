<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Recherche d’utilisateurs
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto p-6">

        <p class="mb-4 text-gray-600">
            Rechercher un utilisateur par nom ou spécialité
        </p>

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('search.index') }}" class="bg-white p-6 rounded-lg shadow mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="name" value="Nom" />
                    <x-text-input
                        id="name"
                        name="name"
                        value="{{ request('name') }}"
                        class="w-full"
                    />
                </div>

                <div>
                    <x-input-label for="specialite" value="Spécialité" />
                    <x-text-input
                        id="specialite"
                        name="specialite"
                        value="{{ request('specialite') }}"
                        class="w-full"
                    />
                </div>
            </div>

            <x-primary-button class="mt-4">
                Rechercher
            </x-primary-button>
        </form>

        <!-- Résultats -->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($users as $user)
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <div class="flex items-center space-x-4">
                    <img
                        src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://via.placeholder.com/80' }}"
                        class="w-20 h-20 rounded-full object-cover"
                    >

                    <div>
                        <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                        <p class="text-gray-600">{{ $user->specialite ?? '—' }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('users.show', $user) }}"
                       class="inline-block text-blue-600 font-medium hover:underline">
                        Voir profil →
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Aucun utilisateur trouvé.</p>

        @endforelse
    </div>


    </div>
</x-app-layout>
