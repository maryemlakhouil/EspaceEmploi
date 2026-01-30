<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Profil utilisateur
        </h2>
    </x-slot>

    <div class="p-6 space-y-4">
        <div class="flex items-center space-x-4">
            <img
                src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://via.placeholder.com/100' }}"
                class="w-24 h-24 rounded-full object-cover"
            >

            <div>
                <h3 class="text-xl font-bold">{{ $user->name }}</h3>
                <p class="text-gray-600">{{ $user->specialite ?? '—' }}</p>
            </div>
        </div>

        <div>
            <h4 class="font-semibold">Bio</h4>
            <p class="text-gray-700">
                {{ $user->bio ?? 'Aucune bio disponible.' }}
            </p>
        </div>
    </div>
</x-app-layout>
