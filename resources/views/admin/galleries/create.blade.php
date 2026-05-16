<x-admin-layout>
    <x-slot name="header">Create Gallery</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6">
            <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" value="{{ old('title') }}">
                    @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <x-file-upload name="image" required="true" label="Image" />
                    @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">{{ old('description') }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-3 mt-6">
                    <button type="submit" class="px-5 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-hover transition-colors">Save</button>
                    <a href="{{ route('galleries.index') }}" class="px-5 py-2.5 text-gray-600 bg-white border border-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
