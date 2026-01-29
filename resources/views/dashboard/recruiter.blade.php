<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Dashboard Recruteur
        </h2>
    </x-slot>

    <div class="p-6">
        Bienvenue {{ auth()->user()->name }} 
        <p>Gérez votre entreprise et vos connexions.</p>
    </div>
</x-app-layout>
