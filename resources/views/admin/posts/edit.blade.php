<x-admin-layout>
    <x-slot name="header">Edit Post</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6">
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-slate-700">Title</label>
                    <input type="text" name="title" id="title" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="{{ old('title', $post->title) }}" required>
                    @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-slate-700">Featured Image</label>
                    <x-file-upload name="image" currentImage="{{ $post->image }}" />
                    @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label for="content" class="block mb-2 text-sm font-medium text-slate-700">Content</label>
                    <textarea name="content" id="content" rows="10" class="wysiwyg-editor">{{ old('content', $post->content) }}</textarea>
                    @error('content') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <div class="flex items-start">
                        <input id="is_published" name="is_published" type="checkbox" value="1" class="h-4 w-4 rounded border-slate-300 text-sky-500 focus:ring-sky-500 mt-0.5" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                        <div class="ml-3">
                            <label for="is_published" class="text-sm font-medium text-slate-700">Publish Immediately</label>
                            <p class="text-sm text-slate-500">Make this post visible to the public.</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-6">
                    <button type="submit" class="px-5 py-2.5 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition-colors">Update</button>
                    <a href="{{ route('posts.index') }}" class="px-5 py-2.5 text-slate-600 bg-white border border-slate-300 text-sm font-medium rounded-lg hover:bg-slate-50 transition-colors">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
