<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Dashboard Chercheur d’emploi
        </h2>
    </x-slot>

    <div class="p-6">
        Bienvenue {{ auth()->user()->name }} 
        <p>Explorez des profils et développez votre réseau.</p>
    </div>
</x-app-layout>
