<x-app-layout>
    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                {{-- LEFT: Profil + menu --}}
                <aside class="lg:col-span-3 space-y-5">
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                        <div class="h-20 bg-gradient-to-r from-blue-600 to-blue-400"></div>

                        <div class="p-6 -mt-10">
                            <div class="w-20 h-20 rounded-full bg-white border-4 border-white shadow-md flex items-center justify-center overflow-hidden">
                                <span class="text-2xl font-bold text-blue-600">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                            </div>

                            <div class="mt-4">
                                <div class="text-lg font-bold text-gray-900">
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="text-sm text-gray-600 mt-1">Chercheur d'emploi</div>
                                <div class="text-xs text-gray-500 mt-2">ID: {{ auth()->id() }}</div>
                            </div>

                            <div class="mt-6 space-y-3">
                                <a href="{{ route('job-offers.index') }}"
                                   class="block w-full text-center px-4 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition duration-200 shadow-sm">
                                    Parcourir offres
                                </a>

                                <a href="{{ route('profile.edit') }}"
                                   class="block w-full text-center px-4 py-3 rounded-lg border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition duration-200">
                                    Mon profil
                                </a>

                                <a href="{{ route('search.index') }}"
                                   class="block w-full text-center px-4 py-3 rounded-lg border border-gray-300 text-gray-900 font-semibold hover:bg-gray-50 transition duration-200">
                                    Rechercher
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="text-sm font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.658 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                            Raccourcis
                        </div>
                        <div class="mt-4 space-y-2 text-sm">
                            <a class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" href="{{ route('job-offers.index') }}">
                                Voir les offres
                            </a>
                            <a class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" href="{{ route('profile.edit') }}">
                                Éditer mon profil
                            </a>
                            <a class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-blue-50 transition duration-200" href="{{ route('search.index') }}">
                                Rechercher des profils
                            </a>
                        </div>
                    </div>
                </aside>

                {{-- CENTER: Actions principales --}}
                <main class="lg:col-span-6 space-y-5">

                   

                    {{-- Cartes de navigation --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('search.index') }}"
                           class="bg-white rounded-lg shadow-md border border-gray-200 p-5 hover:shadow-lg hover:border-blue-300 transition duration-200 group">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="bg-blue-50 p-3 rounded-lg group-hover:bg-blue-100 transition">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-xs text-gray-600 font-semibold uppercase">Découvrir</div>
                            <div class="mt-2 text-base font-bold text-gray-900">Rechercher des profils</div>
                            <div class="mt-2 text-sm text-gray-600">
                                Trouvez des recruteurs et professionnels.
                            </div>
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="bg-white rounded-lg shadow-md border border-gray-200 p-5 hover:shadow-lg hover:border-green-300 transition duration-200 group">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="bg-green-50 p-3 rounded-lg group-hover:bg-green-100 transition">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-xs text-gray-600 font-semibold uppercase">Profil</div>
                            <div class="mt-2 text-base font-bold text-gray-900">Mon profil</div>
                            <div class="mt-2 text-sm text-gray-600">
                                Mettre à jour vos informations.
                            </div>
                        </a>
                    </div>

                    {{-- Zone conseils --}}
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="flex items-center justify-between mb-5">
                            <div class="text-base font-bold text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Conseils
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="p-4 rounded-lg bg-blue-50 border border-blue-100">
                                <div class="text-sm font-semibold text-blue-900 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2z" clip-rule="evenodd"></path>
                                    </svg>
                                    Complétez votre profil
                                </div>
                                <div class="text-sm text-blue-800 mt-2">
                                    Un profil complet augmente vos chances d'être contacté par les recruteurs.
                                </div>
                            </div>

                            <div class="p-4 rounded-lg bg-green-50 border border-green-100">
                                <div class="text-sm font-semibold text-green-900 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 3.062v2.332A6 6 0 0012 14.27V3.455z" clip-rule="evenodd"></path>
                                    </svg>
                                    Parcourez les offres
                                </div>
                                <div class="text-sm text-green-800 mt-2">
                                    Découvrez toutes les opportunités disponibles et postulez aux offres qui vous intéressent.
                                </div>
                            </div>
                        </div>
                    </div>

                </main>

                {{-- RIGHT: Panneaux info --}}
                <aside class="lg:col-span-3 space-y-5">
                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            À faire
                        </div>
                        <ul class="mt-4 space-y-3 text-sm text-gray-700">
                            <li class="flex gap-3 items-start">
                                <span class="mt-1.5 w-2 h-2 rounded-full bg-blue-600 flex-shrink-0"></span>
                                <span>Compléter votre profil</span>
                            </li>
                            <li class="flex gap-3 items-start">
                                <span class="mt-1.5 w-2 h-2 rounded-full bg-blue-600 flex-shrink-0"></span>
                                <span>Parcourir les offres d'emploi</span>
                            </li>
                            <li class="flex gap-3 items-start">
                                <span class="mt-1.5 w-2 h-2 rounded-full bg-blue-600 flex-shrink-0"></span>
                                <span>Développer votre réseau</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-base font-bold text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 12H9m6 0a4 4 0 11-8 0m8 0H9m8-5v10a4 4 0 01-8 0v-10"></path>
                                </svg>
                                Réseau
                            </div>
                            <a href="{{ route('search.index') }}" class="text-xs text-blue-600 hover:text-blue-700 font-semibold">Trouver</a>
                        </div>

                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <div class="text-xs font-bold text-gray-700 uppercase tracking-wide mb-3">
                                Statut
                            </div>
                            <div class="text-sm text-gray-600">
                                Connectez-vous avec d'autres professionnels pour élargir votre réseau.
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('search.index') }}"
                               class="flex items-center justify-center px-4 py-2 rounded-lg bg-blue-50 text-blue-600 font-semibold hover:bg-blue-100 transition duration-200 text-sm">
                                Découvrir des connexions
                            </a>
                        </div>
                    </div>

                </aside>

            </div>
        </div>
    </div>
</x-app-layout>
