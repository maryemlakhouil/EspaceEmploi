<x-app-layout>
    <ul class="space-y-2">
    <li>
        <a href="{{ route('dashboard.recruiter') }}"
           class="text-blue-600">Dashboard</a>
    </li>

    <li>
        <a href="{{ route('recruiter.applications') }}"
           class="text-blue-600">Candidatures reçues</a>
    </li>

    <li>
        <a href="{{ route('job-offers.index') }}"
           class="text-blue-600">Mes offres</a>
    </li>
</ul>


    <div class="max-w-6xl mx-auto p-6 space-y-8">

        <!-- Bienvenue -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-2xl font-bold">
                 Bienvenue {{ auth()->user()->name }}
            </h3>
            <a href="{{ route('recruiter.applications') }}"
               class="inline-block bg-indigo-600 text-white px-4 py-2 rounded shadow">
                Voir les candidatures
            </a>

            <p class="text-gray-600 mt-2">
                Découvrez des profils de chercheurs d’emploi et développez votre réseau.
            </p>
        </div>

        <!-- Feed de profils -->
        <div>
            <h4 class="text-xl font-semibold mb-4">
                Profils recommandés
            </h4>

            @php
                $chercheurs = \App\Models\User::where('role', 'chercheur')
                    ->where('id', '!=', auth()->id())
                    ->latest()
                    ->take(6)
                    ->get();
            @endphp

            @if($chercheurs->count())

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($chercheurs as $user)
                        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                            <div class="flex items-center space-x-4">
                                <img
                                    src="{{ $user->photo
                                        ? asset('storage/'.$user->photo)
                                        : 'https://ui-avatars.com/api/?name='.$user->name }}"
                                    class="w-16 h-16 rounded-full object-cover"
                                >

                                <div>
                                    <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                                    <p class="text-gray-600 text-sm">
                                        {{ $user->specialite ?? 'Spécialité non renseignée' }}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('users.show', $user) }}"
                                   class="text-blue-600 font-medium hover:underline">
                                    Voir profil
                                </a>

                                <button
                                    class="text-sm px-3 py-1 border border-blue-600 text-blue-600 rounded hover:bg-blue-50">
                                    Se connecter
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

            @else
                <div class="bg-yellow-50 p-6 rounded-lg text-yellow-700">
                    Aucun profil de chercheur disponible pour le moment.
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
