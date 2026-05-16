<x-admin-layout>
    <x-slot name="header">
        Create Navigation Item
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <form action="{{ route('navigations.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="label" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Label</label>
                    <input type="text" name="label" id="label" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('label') }}" required>
                    @error('label')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL</label>
                    <input type="text" name="url" id="url" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('url') }}" required placeholder="https://example.com or /about">
                    @error('url')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Position</label>
                    <x-select name="position" :options="['header' => 'Header', 'footer' => 'Footer']" selected="{{ old('position', 'header') }}" />
                    @error('position')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="order" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Order (Lower numbers appear first)</label>
                    <input type="number" name="order" id="order" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('order', 0) }}" required min="0">
                    @error('order')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-4 mt-6">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                        Save
                    </button>
                    <a href="{{ route('navigations.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
