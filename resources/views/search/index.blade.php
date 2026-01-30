<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Recherche d’utilisateurs
        </h2>
    </x-slot>

    <div class="p-6">

        <p class="mb-4 text-gray-600">
            Rechercher un utilisateur par nom ou spécialité
        </p>

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('search.index') }}" class="mb-6">
            <div class="grid grid-cols-2 gap-4">
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
        <div class="space-y-4">
            @forelse($users as $user)
                <div class="p-4 border rounded-lg bg-white shadow-sm">
                    <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                    <p class="text-gray-600">{{ $user->specialite ?? '—' }}</p>

                    <a href="{{ route('users.show', $user->id) }}"
                       class="text-blue-600 hover:underline">
                        Voir profil
                    </a>
                </div>
            @empty
                <p class="text-gray-500">Aucun utilisateur trouvé.</p>
            @endforelse
        </div>

    </div>
</x-app-layout>
