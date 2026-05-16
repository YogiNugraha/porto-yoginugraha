<x-admin-layout>
    <x-slot name="header">Add New Project</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6">
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-slate-700">Title <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" required>
                        @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="tagline" class="block mb-2 text-sm font-medium text-slate-700">Tagline</label>
                        <input type="text" id="tagline" name="tagline" value="{{ old('tagline') }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-slate-700">Category / Badge</label>
                        <input type="text" id="category" name="category" value="{{ old('category') }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="e.g. Nasional, Umum">
                    </div>
                    <div>
                        <label for="link" class="block mb-2 text-sm font-medium text-slate-700">External Link</label>
                        <input type="url" id="link" name="link" value="{{ old('link') }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="https://...">
                    </div>
                    <div>
                        <label for="year" class="block mb-2 text-sm font-medium text-slate-700">Year</label>
                        <input type="number" id="year" name="year" value="{{ old('year') }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="client" class="block mb-2 text-sm font-medium text-slate-700">Client / Institution</label>
                        <input type="text" id="client" name="client" value="{{ old('client') }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-slate-700">Your Role</label>
                        <input type="text" id="role" name="role" value="{{ old('role') }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="e.g. Full-Stack Developer">
                    </div>
                    <div>
                        <label for="stack" class="block mb-2 text-sm font-medium text-slate-700">Tech Stack (Comma Separated)</label>
                        <input type="text" id="stack" name="stack" value="{{ old('stack') }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" placeholder="PHP, Laravel, React">
                    </div>
                    <div>
                        <label for="order" class="block mb-2 text-sm font-medium text-slate-700">Order</label>
                        <input type="number" id="order" name="order" value="{{ old('order', 0) }}" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                    </div>
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-slate-700">Short Description (For Cards)</label>
                    <textarea id="description" name="description" rows="3" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">{{ old('description') }}</textarea>
                </div>

                <div class="mb-5">
                    <label for="content" class="block mb-2 text-sm font-medium text-slate-700">Detail Content</label>
                    <textarea id="content" name="content" class="wysiwyg-editor">{{ old('content') }}</textarea>
                </div>

                <div class="mb-5">
                    <x-file-upload id="image" name="image" label="Project Image / Thumbnail" />
                    @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-4 mb-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input id="is_published" type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-sky-500 focus:ring-sky-500">
                        <span class="text-sm font-medium text-slate-700">Publish Immediately</span>
                    </label>
                </div>

                <div class="flex items-center gap-4 mb-5">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input id="is_starred" type="checkbox" name="is_starred" value="1" {{ old('is_starred') ? 'checked' : '' }} class="h-4 w-4 rounded border-slate-300 text-sky-500 focus:ring-sky-500">
                        <span class="text-sm font-medium text-slate-700">Tampilkan di Pilihan Favorit (Beranda / Karya Section)</span>
                    </label>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="px-5 py-2.5 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition-colors">Save Project</button>
                    <a href="{{ route('projects.index') }}" class="px-5 py-2.5 text-slate-600 bg-white border border-slate-300 text-sm font-medium rounded-lg hover:bg-slate-50 transition-colors">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
