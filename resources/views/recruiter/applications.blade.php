<h1 class="text-2xl font-bold mb-6">Candidatures reçues</h1>

<table class="w-full border">
    <thead>
        <tr class="bg-gray-100">
            <th class="p-2">Candidat</th>
            <th class="p-2">Offre</th>
            <th class="p-2">Statut</th>
        </tr>
    </thead>

    <tbody>
        @foreach($applications as $application)
            <tr class="border-t">
                <td class="p-2">{{ $application->user->name }}</td>
                <td class="p-2">{{ $application->jobOffer->title }}</td>
                <td class="p-2">{{ $application->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
