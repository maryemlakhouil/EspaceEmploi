<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Recherche d’utilisateurs
        </h2>
    </x-slot>

    <div class="p-6">

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('search.index') }}" class="mb-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-input-label value="Nom" />
                    <x-text-input name="name" value="{{ request('name') }}" />
                </div>

                <div>
                    <x-input-label value="Spécialité" />
                    <x-text-input name="specialite" value="{{ request('specialite') }}" />
                </div>
            </div>

            <x-primary-button class="mt-4">
                Rechercher
            </x-primary-button>
        </form>

        <!-- Résultats -->
        <div class="space-y-4">
            @forelse($users as $user)
                <div class="p-4 border rounded">
                    <h3 class="font-bold">{{ $user->name }}</h3>
                    <p>{{ $user->specialite ?? '—' }}</p>

                    <a href="{{ route('users.show', $user->id) }}"
                       class="text-blue-600">
                        Voir profil
                    </a>
                </div>
            @empty
                <p>Aucun utilisateur trouvé.</p>
            @endforelse
        </div>

    </div>
</x-app-layout>
