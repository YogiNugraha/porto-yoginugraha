<x-admin-layout>
    <x-slot name="header">Edit Tech Stack</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6">
            <form action="{{ route('skills.update', $skill) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $skill->name) }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="order" class="block mb-2 text-sm font-medium text-gray-700">Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $skill->order) }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        <p class="mt-1 text-xs text-gray-500">Lower numbers appear first.</p>
                        @error('order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-5 p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <h3 class="mb-4 text-sm font-medium text-gray-900">Icon / Image (Pilih salah satu)</h3>
                    
                    @if($skill->image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mb-2">Current Icon:</p>
                            @if(str_starts_with($skill->image, 'http'))
                                <img src="{{ $skill->image }}" alt="{{ $skill->name }}" class="h-16 w-auto object-contain bg-white p-2 rounded border border-gray-200">
                            @else
                                <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}" class="h-16 w-auto object-contain bg-white p-2 rounded border border-gray-200">
                            @endif
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="image_url" class="block mb-2 text-sm font-medium text-gray-700">URL Icon (Misal dari Devicon)</label>
                        <input type="url" id="image_url" name="image_url" value="{{ old('image_url', str_starts_with($skill->image ?? '', 'http') ? $skill->image : '') }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">
                        @error('image_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        <p class="mt-1 text-xs text-gray-500">Jika diisi, akan mengabaikan file yang diunggah.</p>
                    </div>

                    <div>
                        <x-file-upload id="image" name="image" label="Atau Upload File Gambar (Ganti baru)" />
                        @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="px-5 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-hover transition-colors">Update</button>
                    <a href="{{ route('skills.index') }}" class="px-5 py-2.5 text-gray-600 bg-white border border-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
