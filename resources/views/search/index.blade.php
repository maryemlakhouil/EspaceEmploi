<x-app-layout>
  

    <div class="max-w-5xl mx-auto p-6">

        <p class="mb-6 text-gray-600 text-base">
            Rechercher un utilisateur par nom ou spécialité
        </p>

        <!-- Formulaire de recherche -->
        <form method="GET" action="{{ route('search.index') }}" class="bg-white rounded-lg shadow-md border border-gray-100 p-8 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <x-input-label for="name" value="Nom" />
                    <x-text-input
                        id="name"
                        name="name"
                        value="{{ request('name') }}"
                        class="w-full mt-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                    />
                </div>

                <div>
                    <x-input-label for="specialite" value="Spécialité" />
                    <x-text-input
                        id="specialite"
                        name="specialite"
                        value="{{ request('specialite') }}"
                        class="w-full mt-2 border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500"
                    />
                </div>
            </div>

            <x-primary-button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition duration-200">
                Rechercher
            </x-primary-button>
        </form>

        <!-- Résultats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($users as $user)
            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg hover:border-blue-300 transition duration-200">
                <div class="flex items-center gap-4 mb-4">
                    <img
                        src="{{ $user->photo ? asset('storage/'.$user->photo) : 'https://via.placeholder.com/80' }}"
                        alt="{{ $user->name }}"
                        class="w-16 h-16 rounded-full object-cover border-2 border-gray-200"
                    >

                    <div class="flex-1">
                        <h3 class="font-bold text-lg text-gray-900">{{ $user->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ $user->specialite ?? '—' }}</p>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-200">
                    <a href="{{ route('users.show', $user) }}"
                       class="inline-block text-blue-600 font-semibold hover:text-blue-700 text-sm transition">
                        Voir profil →
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-2 bg-white rounded-lg shadow-md border border-gray-100 p-12 text-center">
                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <p class="text-gray-600 text-base">Aucun utilisateur trouvé.</p>
            </div>

        @endforelse
    </div>

    </div>
</x-app-layout>
