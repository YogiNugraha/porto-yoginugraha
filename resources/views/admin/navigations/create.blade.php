<x-admin-layout>
    <x-slot name="header">Create Navigation Item</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6">
            <form action="{{ route('navigations.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="label" class="block mb-2 text-sm font-medium text-slate-700">Label</label>
                    <input type="text" name="label" id="label" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="{{ old('label') }}" required>
                    @error('label') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label for="url" class="block mb-2 text-sm font-medium text-slate-700">URL</label>
                    <input type="text" name="url" id="url" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="{{ old('url') }}" required placeholder="https://example.com or /about">
                    @error('url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label for="position" class="block mb-2 text-sm font-medium text-slate-700">Position</label>
                    <x-select name="position" :options="['header' => 'Header', 'footer' => 'Footer']" selected="{{ old('position', 'header') }}" />
                    @error('position') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-5">
                    <label for="order" class="block mb-2 text-sm font-medium text-slate-700">Order (Lower numbers appear first)</label>
                    <input type="number" name="order" id="order" class="bg-white border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="{{ old('order', 0) }}" required min="0">
                    @error('order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-3 mt-6">
                    <button type="submit" class="px-5 py-2.5 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition-colors">Save</button>
                    <a href="{{ route('navigations.index') }}" class="px-5 py-2.5 text-slate-600 bg-white border border-slate-300 text-sm font-medium rounded-lg hover:bg-slate-50 transition-colors">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
