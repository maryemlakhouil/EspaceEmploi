<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Profil de {{ $user->name }}
        </h2>
    </x-slot>

    <div class="p-6">
        <p><strong>Spécialité :</strong> {{ $user->specialite ?? '—' }}</p>
        <p><strong>Bio :</strong> {{ $user->bio ?? '—' }}</p>

        <!-- Plus tard : bouton envoyer demande d’amitié -->
    </div>
</x-app-layout>
