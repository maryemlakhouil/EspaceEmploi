<div class="space-y-4">
    <div class="flex gap-2">
        <input wire:model.live="q" class="border rounded p-2 w-full" placeholder="Rechercher...">
        <select wire:model.live="filter" class="border rounded p-2">
            <option value="all">Tous</option>
            <option value="open">Ouverts</option>
            <option value="closed">Fermés</option>
        </select>
    </div>

    <div class="bg-white border rounded">
        @foreach($offers as $offer)
            <div class="p-4 border-b flex justify-between items-center">
                <div>
                    <div class="font-semibold">{{ $offer->title }}</div>
                    <div class="text-sm text-gray-600">{{ $offer->company }} — {{ $offer->contract_type }}</div>
                    <div class="text-xs">Statut: <b>{{ $offer->is_closed ? 'fermé' : 'ouvert' }}</b></div>
                </div>

                <div class="flex gap-2">
                    <a class="px-3 py-1 border rounded" href="{{ route('job-offers.edit', $offer) }}">Modifier</a>

                    @if(!$offer->is_closed)
                        <form method="POST" action="{{ route('job-offers.close', $offer) }}">
                            @csrf
                            @method('PATCH')
                            <button class="px-3 py-1 bg-gray-800 text-white rounded">Clôturer</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{ $offers->links() }}
</div>
