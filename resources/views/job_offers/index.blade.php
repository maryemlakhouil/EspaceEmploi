<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Mes offres</h2>
            <a href="{{ route('job-offers.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                + Créer une offre
            </a>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto p-6 space-y-4">
        @if (session('success'))
            <div class="p-4 rounded bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border rounded-xl overflow-hidden">
            @forelse($jobOffers as $offer)
                <div class="p-4 border-b flex items-center justify-between">
                    <div>
                        <div class="font-semibold text-gray-800">{{ $offer->title }}</div>
                        <div class="text-sm text-gray-600">{{ $offer->company }} • {{ $offer->contract_type }}</div>
                        <div class="text-xs mt-1">
                            Statut:
                            <b>{{ $offer->is_closed ? 'fermé' : 'ouvert' }}</b>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('job-offers.edit', $offer->id) }}"
                           class="px-3 py-1 border rounded hover:bg-gray-50">
                            Modifier
                        </a>

                        @if(!$offer->is_closed)
                            <form method="POST" action="{{ route('job-offers.close', $offer->id) }}">
                                @csrf
                                @method('PATCH')
                                <button class="px-3 py-1 bg-gray-900 text-white rounded">
                                    Clôturer
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-6 text-gray-600">
                    Aucune offre pour le moment.
                </div>
            @endforelse
        </div>

        <div>
            {{ $jobOffers->links() }}
        </div>
    </div>
</x-app-layout>
