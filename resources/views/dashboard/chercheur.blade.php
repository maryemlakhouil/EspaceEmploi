<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Dashboard — Chercheur d'emploi
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto p-6 space-y-6">

        <!-- Bienvenue -->
        <div class="bg-white rounded-lg shadow-md border border-gray-100 p-8">
            <h3 class="text-3xl font-bold text-gray-900">
                Bienvenue {{ auth()->user()->name }}
            </h3>
            <p class="text-gray-600 mt-3 text-base leading-relaxed">
                Explorez des profils, développez votre réseau et découvrez de nouvelles opportunités.
            </p>
            <a href="{{ route('job-offers.index') }}"
               class="inline-block bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200 mt-6">
                Rechercher des offres
            </a>
        </div>

        <!-- Actions rapides -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Recherche -->
            <a href="{{ route('search.index') }}"
               class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg hover:border-blue-300 transition duration-200 group">
                <div class="flex items-start gap-3 mb-3">
                    <div class="bg-blue-50 p-3 rounded-lg group-hover:bg-blue-100 transition">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <h4 class="font-bold text-lg text-gray-900 group-hover:text-blue-600 transition">Rechercher des profils</h4>   
                <p class="text-gray-600 mt-2 text-sm">
                    Trouvez des recruteurs ou d'autres chercheurs par spécialité.
                </p>
            </a>

            <!-- Profil -->
            <a href="{{ route('profile.edit') }}"
               class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg hover:border-green-300 transition duration-200 group">
                <div class="flex items-start gap-3 mb-3">
                    <div class="bg-green-50 p-3 rounded-lg group-hover:bg-green-100 transition">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
                <h4 class="font-bold text-lg text-gray-900 group-hover:text-green-600 transition">Mon profil</h4>
                <p class="text-gray-600 mt-2 text-sm">
                    Mettez à jour votre bio, photo et spécialité.
                </p>
            </a>

            <!-- Réseau -->
            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition duration-200 group cursor-default">
                <div class="flex items-start gap-3 mb-3">
                    <div class="bg-purple-50 p-3 rounded-lg group-hover:bg-purple-100 transition">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a4 4 0 11-8 0m8 0H9m8-5v10a4 4 0 01-8 0v-10"></path>
                        </svg>
                    </div>
                </div>
                <h4 class="font-bold text-lg text-gray-900">Mon réseau</h4>
                <p class="text-gray-600 mt-2 text-sm">
                    Consultez vos connexions et demandes en attente.
                </p>
            </div>
        </div>

    </div>
</x-app-layout>
