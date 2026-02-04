<x-app-layout>
    <div class="max-w-4xl mx-auto py-10">

        <div class="bg-white rounded-xl shadow border p-8">

            <div class="flex justify-between items-start mb-4">
                <h1 class="text-3xl font-bold text-gray-900">
                    {{ $jobOffer->title }}
                </h1>

                <span class="px-4 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">
                    {{ $jobOffer->contract_type }}
                </span>
            </div>

            <p class="text-gray-700 leading-relaxed mb-6">
                {{ $jobOffer->description }}
            </p>

            <div class="flex justify-between items-center">
                <a href="{{ route('job-offers.index') }}"
                   class="text-gray-600 hover:text-gray-900">
                    ← Retour aux offres
                </a>

                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg">
                    Postuler
                </button>
            </div>

        </div>
        

    </div>
</x-app-layout>
