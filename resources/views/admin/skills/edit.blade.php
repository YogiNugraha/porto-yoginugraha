<x-admin-layout>
    <x-slot name="header">
        Edit Tech Stack
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <form action="{{ route('skills.update', $skill) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $skill->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        @error('name') <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $skill->order) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        <p class="mt-1 text-xs text-gray-500">Lower numbers appear first.</p>
                        @error('order') <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-6 p-4 border rounded-lg bg-gray-50 dark:bg-gray-900 dark:border-gray-700">
                    <h3 class="mb-4 text-sm font-medium text-gray-900 dark:text-white">Icon / Image (Pilih salah satu)</h3>
                    
                    @if($skill->image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Current Icon:</p>
                            @if(str_starts_with($skill->image, 'http'))
                                <img src="{{ $skill->image }}" alt="{{ $skill->name }}" class="h-16 w-auto object-contain bg-white p-2 rounded">
                            @else
                                <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}" class="h-16 w-auto object-contain bg-white p-2 rounded">
                            @endif
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">URL Icon (Misal dari Devicon)</label>
                        <input type="url" id="image_url" name="image_url" value="{{ old('image_url', str_starts_with($skill->image ?? '', 'http') ? $skill->image : '') }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        @error('image_url') <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                        <p class="mt-1 text-xs text-gray-500">Jika diisi, akan mengabaikan file yang diunggah.</p>
                    </div>

                    <div>
                        <x-file-upload 
                            id="image" 
                            name="image" 
                            label="Atau Upload File Gambar (Ganti baru)"
                        />
                        @error('image') <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Update
                    </button>
                    <a href="{{ route('skills.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
