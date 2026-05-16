<x-admin-layout>
    <x-slot name="header">Edit Experience / Education</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6">
            <form action="{{ route('experiences.update', $experience) }}" method="POST">
                @csrf @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-700">Type</label>
                        <select id="type" name="type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required>
                            <option value="work" {{ old('type', $experience->type) == 'work' ? 'selected' : '' }}>Work / Professional Experience</option>
                            <option value="education" {{ old('type', $experience->type) == 'education' ? 'selected' : '' }}>Education</option>
                        </select>
                        @error('type') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Title / Degree</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $experience->title) }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="company" class="block mb-2 text-sm font-medium text-gray-700">Company / Institution</label>
                        <input type="text" id="company" name="company" value="{{ old('company', $experience->company) }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        @error('company') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="date_range" class="block mb-2 text-sm font-medium text-gray-700">Date Range</label>
                        <input type="text" id="date_range" name="date_range" value="{{ old('date_range', $experience->date_range) }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        @error('date_range') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="order" class="block mb-2 text-sm font-medium text-gray-700">Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $experience->order) }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" required>
                        <p class="mt-1 text-xs text-gray-500">Lower numbers appear first.</p>
                        @error('order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5">{{ old('description', $experience->description) }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="px-5 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-hover transition-colors">Update</button>
                    <a href="{{ route('experiences.index') }}" class="px-5 py-2.5 text-gray-600 bg-white border border-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
