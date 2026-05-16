<x-admin-layout>
    <x-slot name="header">
        Edit Project
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        @error('title') <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="tagline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tagline</label>
                        <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $project->tagline) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category / Badge</label>
                        <input type="text" id="category" name="category" value="{{ old('category', $project->category) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="e.g. Nasional, Umum, Universitas">
                    </div>

                    <div>
                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">External Link</label>
                        <input type="url" id="link" name="link" value="{{ old('link', $project->link) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://...">
                    </div>

                    <div>
                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Year</label>
                        <input type="number" id="year" name="year" value="{{ old('year', $project->year) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div>
                        <label for="client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Client / Institution</label>
                        <input type="text" id="client" name="client" value="{{ old('client', $project->client) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your Role</label>
                        <input type="text" id="role" name="role" value="{{ old('role', $project->role) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="e.g. Full-Stack Developer">
                    </div>

                    <div>
                        <label for="stack" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tech Stack (Comma Separated)</label>
                        <input type="text" id="stack" name="stack" value="{{ old('stack', $project->stack) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="PHP, Laravel, React">
                    </div>

                    <div>
                        <label for="order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order', $project->order) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Short Description (For Cards)</label>
                    <textarea id="description" name="description" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Detail Content (Features, Full Description, etc)</label>
                    <textarea id="content" name="content" class="wysiwyg-editor">{{ old('content', $project->content) }}</textarea>
                </div>

                <div class="mb-6">
                    <x-file-upload 
                        id="image" 
                        name="image" 
                        label="Project Image / Thumbnail"
                        :existingImage="$project->image"
                    />
                    @error('image') <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center mb-6">
                    <input id="is_published" type="checkbox" name="is_published" value="1" {{ old('is_published', $project->is_published) ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="is_published" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Publish Immediately</label>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Update Project
                    </button>
                    <a href="{{ route('projects.index') }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
