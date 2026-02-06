<x-app-layout>
    <div class="max-w-6xl mx-auto py-10">

        <h1 class="text-3xl font-bold mb-6">
            Candidatures reçues
        </h1>

        @forelse ($jobOffers as $offer)
            <div class="bg-white rounded-xl shadow mb-6 p-6">

                <h2 class="text-xl font-bold mb-4">
                    {{ $offer->title }}
                </h2>

                @if ($offer->applications->count())
                    <ul class="space-y-3">
                        @foreach ($offer->applications as $application)
    <div class="border rounded p-4 mb-3 flex justify-between items-center">

        <div>
            <p class="font-semibold">{{ $application->user->name }}</p>
            <p class="text-sm text-gray-600">
                Statut :
                <span class="font-bold">
                    {{ $application->status }}
                </span>
            </p>
        </div>

        @if ($application->status === 'en_attente')
            <form method="POST"
                  action="{{ route('applications.updateStatus', $application) }}"
                  class="flex gap-2">
                @csrf
                @method('PATCH')

                <button name="status" value="accepte"
                        class="bg-green-600 text-white px-3 py-1 rounded">
                    Accepter
                </button>

                <button name="status" value="refuse"
                        class="bg-red-600 text-white px-3 py-1 rounded">
                    Refuser
                </button>
            </form>
        @endif

    </div>
@endforeach

                    </ul>
                @else
                    <p class="text-gray-500">
                        Aucune candidature pour cette offre.
                    </p>
                @endif

            </div>
        @empty
            <p>Aucune offre trouvée.</p>
        @endforelse

    </div>
</x-app-layout>
