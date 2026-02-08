<x-app-layout>
    <div class="bg-gray-100 min-h-screen py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                {{-- LEFT: Card principale --}}
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                        {{-- Image --}}
                        @if($jobOffer->image)
                            <div class="h-56 bg-gray-100">
                                <img
                                    src="{{ asset('storage/' . $jobOffer->image) }}"
                                    alt="Image offre"
                                    class="w-full h-full object-cover"
                                >
                            </div>
                        @endif

                        <div class="p-6">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                                        {{ $jobOffer->title }}
                                    </h1>

                                    <div class="mt-2 flex flex-wrap items-center gap-2 text-sm text-gray-600">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-gray-100 text-gray-700">
                                            {{ $jobOffer->company }}
                                        </span>

                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-700 font-medium">
                                            {{ $jobOffer->type_contrat }}
                                        </span>

                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                            {{ $jobOffer->is_closed ? 'bg-red-50 text-red-700' : 'bg-green-50 text-green-700' }}">
                                            <span class="w-2 h-2 rounded-full mr-2 {{ $jobOffer->is_closed ? 'bg-red-600' : 'bg-green-600' }}"></span>
                                            {{ $jobOffer->is_closed ? 'Fermée' : 'Ouverte' }}
                                        </span>
                                    </div>
                                </div>

                                {{-- CTA à droite --}}
                                <div class="flex-shrink-0">
                                    @if ($jobOffer->is_closed)
                                        <span class="inline-flex px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-sm">
                                            Offre clôturée
                                        </span>
                                    @else
                                        @if ($hasApplied)
                                            <span class="inline-flex px-4 py-2 rounded-full bg-gray-200 text-gray-700 text-sm">
                                                Déjà postulé
                                            </span>
                                        @else
                                            <form method="POST" action="{{ route('applications.store', $jobOffer->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="px-5 py-2 rounded-full bg-green-600 text-white font-semibold hover:bg-green-700">
                                                    Postuler
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="mt-6">
                                <h2 class="text-lg font-bold text-gray-900">Description</h2>
                                <p class="mt-2 text-gray-700 leading-relaxed whitespace-pre-line">
                                    {{ $jobOffer->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Panneau infos --}}
                <div class="lg:col-span-4 space-y-4">
                    <div class="bg-white rounded-2xl shadow-sm border p-5">
                        <div class="text-sm font-semibold text-gray-800">Informations</div>

                        <div class="mt-3 space-y-3 text-sm">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Entreprise</span>
                                <span class="font-semibold text-gray-900">{{ $jobOffer->company }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Contrat</span>
                                <span class="font-semibold text-gray-900">{{ $jobOffer->type_contrat }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Statut</span>
                                <span class="font-semibold {{ $jobOffer->is_closed ? 'text-red-700' : 'text-green-700' }}">
                                    {{ $jobOffer->is_closed ? 'Fermée' : 'Ouverte' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border p-5">
                        <div class="text-sm font-semibold text-gray-800">Actions</div>
                        <div class="mt-3 space-y-2">
                            <a href="{{ route('job-offers.index') }}"
                               class="block text-center px-4 py-2 rounded-full border hover:bg-gray-50">
                                Retour aux offres
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
