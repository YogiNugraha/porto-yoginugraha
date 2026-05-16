<x-admin-layout>
    <x-slot name="header">
        Create Setting
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700" x-data="{ type: '{{ old('type', 'text') }}' }">
            <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="key" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Key Identifier (e.g. hero_title)</label>
                    <input type="text" name="key" id="key" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('key') }}" required>
                    @error('key')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data Type</label>
                    <x-select name="type" @change="type = $event.target.value" :options="['text' => 'Short Text', 'textarea' => 'Long Text', 'image' => 'Image', 'boolean' => 'Boolean (True/False)']" selected="{{ old('type', 'text') }}" />
                    @error('type')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Text Input -->
                <div class="mb-4" x-show="type === 'text'">
                    <label for="value_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Value</label>
                    <input type="text" name="value" id="value_text" :disabled="type !== 'text'" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('value') }}">
                </div>

                <!-- Textarea Input -->
                <div class="mb-4" x-show="type === 'textarea'" style="display: none;">
                    <label for="value_textarea" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Value</label>
                    <textarea name="value" id="value_textarea" :disabled="type !== 'textarea'" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('value') }}</textarea>
                </div>

                <!-- Image Input -->
                <div class="mb-4" x-show="type === 'image'" style="display: none;">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Value (Image)</label>
                    <x-file-upload name="value" />
                </div>

                <!-- Boolean Input -->
                <div class="mb-4" x-show="type === 'boolean'" style="display: none;">
                    <label for="value_boolean" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Value</label>
                    <x-select name="value" :options="['1' => 'True', '0' => 'False']" selected="{{ old('value', '1') }}" x-bind:disabled="type !== 'boolean'" />
                </div>

                @error('value')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror

                <div class="flex items-center gap-4 mt-6">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                        Save
                    </button>
                    <a href="{{ route('settings.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
