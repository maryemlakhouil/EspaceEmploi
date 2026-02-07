<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Modifier l’offre</h2>
            <a href="{{ route('job-offers.index') }}" class="text-blue-600 hover:underline">← Mes offres</a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 space-y-4">

        @if (session('success'))
            <div class="p-4 rounded bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 rounded bg-red-100 text-red-800">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-xl shadow border">
            <form method="POST" action="{{ route('job-offers.update', $jobOffer->id) }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Entreprise</label>
                    <input type="text" name="company" value="{{ old('company', $jobOffer->company) }}"
                           class="w-full border rounded-lg p-2" required>
                    @error('company') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" name="title" value="{{ old('title', $jobOffer->title) }}"
                           class="w-full border rounded-lg p-2" required>
                    @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Type de contrat</label>
                    <input type="text" name="contract_type" value="{{ old('contract_type', $jobOffer->contract_type) }}"
                           class="w-full border rounded-lg p-2" required>
                    @error('contract_type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="6"
                              class="w-full border rounded-lg p-2" required>{{ old('description', $jobOffer->description) }}</textarea>
                    @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Image (jpg/png)</label>

                    @if($jobOffer->image)
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('storage/'.$jobOffer->image) }}" class="w-24 h-24 object-cover rounded border" alt="image">
                            <p class="text-sm text-gray-600">Image actuelle</p>
                        </div>
                    @endif

                    <input type="file" name="image" accept=".jpg,.jpeg,.png"
                           class="w-full border rounded-lg p-2">
                    @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror

                    <p class="text-xs text-gray-500">
                        Laisse vide si tu ne veux pas changer l’image.
                    </p>
                </div>

                <div class="flex flex-wrap gap-2 pt-2">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Enregistrer
                    </button>

                    <a href="{{ route('job-offers.index') }}"
                       class="px-4 py-2 border rounded-lg hover:bg-gray-50">
                        Retour
                    </a>

                    @if(!$jobOffer->is_closed)
                        <form method="POST" action="{{ route('job-offers.close', $jobOffer->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                    class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-800">
                                Clôturer l’offre
                            </button>
                        </form>
                    @else
                        <span class="px-3 py-2 rounded bg-gray-100 text-gray-700">
                            Offre clôturée
                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
