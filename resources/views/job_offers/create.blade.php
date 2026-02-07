<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">Créer une offre</h2>
            <a href="{{ route('job-offers.index') }}" class="text-blue-600 hover:underline">← Mes offres</a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6">
        @if ($errors->any())
            <div class="mb-4 p-4 rounded bg-red-100 text-red-800">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-xl shadow border">
            <form method="POST" action="{{ route('job-offers.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Entreprise</label>
                    <input type="text" name="company" value="{{ old('company') }}"
                           class="w-full border rounded-lg p-2" required>
                    @error('company') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           class="w-full border rounded-lg p-2" required>
                    @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Type de contrat</label>
                    <input type="text" name="type_contrat" value="{{ old('type_contrat') }}"
                           class="w-full border rounded-lg p-2" required>
                    @error('type_contrat') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="6"
                              class="w-full border rounded-lg p-2" required>{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Image (jpg/png)</label>
                    <input type="file" name="image" accept=".jpg,.jpeg,.png"
                           class="w-full border rounded-lg p-2" required>
                    @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror

                    <p class="text-xs text-gray-500 mt-1">
                        Max 2MB. Formats: jpg, png.
                    </p>
                </div>

                <div class="flex gap-2 pt-2">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Publier l’offre
                    </button>
                    <a href="{{ route('job-offers.index') }}"
                       class="px-4 py-2 border rounded-lg hover:bg-gray-50">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
