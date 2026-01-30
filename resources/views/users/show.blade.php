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
        </div>
    </div>
</x-app-layout>
