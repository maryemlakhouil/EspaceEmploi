<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Mes offres</h2>
            <a href="{{ route('job-offers.create') }}"
               class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200 shadow-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Créer une offre
            </a>
        </div>
    </x-slot>

    <div class="max-w-6xl mx-auto p-6 space-y-6">
        @if (session('success'))
            <div class="p-4 rounded-lg bg-green-50 text-green-800 border border-green-200 shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
            @forelse($jobOffers as $offer)
                <div class="p-6 border-b border-gray-100 hover:bg-gray-50 transition duration-200 flex items-center justify-between group">
                    <div class="flex-1">
                        <div class="flex items-start gap-4">
                            {{-- Image --}}
                            <div class="w-20 h-20 rounded-xl overflow-hidden border bg-gray-100 flex-shrink-0">
                                @if($offer->image)
                                    <img
                                        src="{{ asset('storage/' . $offer->image) }}"
                                        alt="Image offre"
                                        class="w-full h-full object-cover"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-xs text-gray-500">
                                        No image
                                    </div>
                                @endif
                            </div>

                            {{-- Contenu --}}
                            <div class="flex-1">
                               <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition">
                                    <a href="{{ route('job_offers.show', $offer->id) }}" class="hover:underline">
                                        {{ $offer->title }}
                                    </a>
                                </h3>


                                <div class="flex items-center gap-2 mt-2 text-gray-600">
                                    ...
                                </div>

                                <div class="flex items-center gap-3 mt-3 flex-wrap">
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-sm font-medium">
                                        {{ $offer->type_contrat }}
                                    </span>

                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium
                                        {{ $offer->is_closed ? 'bg-red-50 text-red-700' : 'bg-green-50 text-green-700' }}">
                                        <span class="w-2 h-2 rounded-full {{ $offer->is_closed ? 'bg-red-600' : 'bg-green-600' }}"></span>
                                        {{ $offer->is_closed ? 'Fermée' : 'Ouverte' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex items-center gap-3 ml-4 flex-shrink-0">
                        <a href="{{ route('job-offers.edit', $offer->id) }}"
                           class="px-4 py-2 rounded-lg border border-gray-300 text-gray-900 font-semibold hover:bg-gray-100 transition duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Modifier
                        </a>

                        @if(!$offer->is_closed)
                            <form method="POST" action="{{ route('job-offers.close', $offer->id) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 rounded-lg bg-gray-900 text-white font-semibold hover:bg-gray-800 transition duration-200 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Clôturer
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p class="text-gray-600 text-lg font-semibold">Aucune offre pour le moment.</p>
                    <p class="text-gray-500 mt-2">Commencez par créer votre première offre d'emploi.</p>
                    <a href="{{ route('job-offers.create') }}"
                       class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                        Créer une offre
                    </a>
                </div>
            @endforelse
        </div>

        <div class="flex justify-center">
            {{ $jobOffers->links() }}
        </div>
    </div>
</x-app-layout>
