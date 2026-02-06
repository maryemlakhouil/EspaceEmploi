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
    <a href="{{ route('recruiter.applications') }}"
   class="block bg-white p-6 rounded-xl shadow hover:bg-gray-50">
    <h3 class="text-xl font-bold">Candidatures reçues</h3>
    <p class="text-gray-600 mt-2">
        Voir les candidats pour vos offres
    </p>    
</a>

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


        </div>

    </div>
</x-app-layout>
