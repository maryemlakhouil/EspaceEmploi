<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 space-y-8">

        <h1 class="text-3xl font-bold">Candidatures reçues</h1>

        @forelse($jobOffers as $offer)
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-4">
                    {{ $offer->title }}
                </h2>

                @if($offer->applications->count())
                    <table class="w-full border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 text-left">Candidat</th>
                                <th class="p-2">Email</th>
                                <th class="p-2">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offer->applications as $application)
                                <tr class="border-t">
                                    <td class="p-2">
                                        {{ $application->user->name }}
                                    </td>
                                    <td class="p-2">
                                        {{ $application->user->email }}
                                    </td>
                                    <td class="p-2">
                                        <span class="px-3 py-1 rounded-full text-xs
                                            {{ $application->status === 'en_attente' ? 'bg-yellow-100 text-yellow-700' : '' }}">
                                            {{ $application->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">Aucune candidature pour cette offre.</p>
                @endif
            </div>
        @empty
            <p>Aucune offre publiée.</p>
        @endforelse

    </div>
</x-app-layout>
