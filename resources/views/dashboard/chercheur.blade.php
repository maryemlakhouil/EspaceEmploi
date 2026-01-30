<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Dashboard — Chercheur d’emploi
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto p-6 space-y-6">

        <!-- Bienvenue -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-2xl font-bold">
                Bienvenue {{ auth()->user()->name }}
            </h3>
            <p class="text-gray-600 mt-2">
                Explorez des profils, développez votre réseau et découvrez de nouvelles opportunités.
            </p>
        </div>

        <!-- Actions rapides -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Recherche -->
            <a href="{{ route('search.index') }}"
               class="bg-blue-50 p-6 rounded-lg shadow hover:bg-blue-100 transition">
                <h4 class="font-bold text-lg">Rechercher des profils</h4>
                <p class="text-gray-600 mt-2">
                    Trouvez des recruteurs ou d’autres chercheurs par spécialité.
                </p>
            </a>

            <!-- Profil -->
            <a href="{{ route('profile.edit') }}"
               class="bg-green-50 p-6 rounded-lg shadow hover:bg-green-100 transition">
                <h4 class="font-bold text-lg">Mon profil</h4>
                <p class="text-gray-600 mt-2">
                    Mettez à jour votre bio, photo et spécialité.
                </p>
            </a>

            <!-- Réseau -->
            <div class="bg-purple-50 p-6 rounded-lg shadow">
                <h4 class="font-bold text-lg"> Mon réseau</h4>
                <p class="text-gray-600 mt-2">
                    Consultez vos connexions et demandes en attente.
                </p>
            </div>
        </div>

    </div>
</x-app-layout>
