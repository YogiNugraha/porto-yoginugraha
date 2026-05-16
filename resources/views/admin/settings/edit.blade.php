<x-admin-layout>
    <x-slot name="header">
        Edit Setting
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-slate-200" x-data="{ type: '{{ old('type', $setting->type) }}' }">
            <form action="{{ route('settings.update', $setting) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="key" class="block text-sm font-medium text-slate-700">Key Identifier</label>
                    <input type="text" name="key" id="key" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm" value="{{ old('key', $setting->key) }}" required>
                    @error('key')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-slate-700">Data Type</label>
                    <x-select name="type" @change="type = $event.target.value" :options="['text' => 'Short Text', 'textarea' => 'Long Text', 'image' => 'Image', 'boolean' => 'Boolean (True/False)']" selected="{{ old('type', $setting->type) }}" />
                    @error('type')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Text Input -->
                <div class="mb-4" x-show="type === 'text'">
                    <label for="value_text" class="block text-sm font-medium text-slate-700">Value</label>
                    <input type="text" name="value" id="value_text" :disabled="type !== 'text'" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm" value="{{ old('value', $setting->type === 'text' ? $setting->value : '') }}">
                </div>

                <!-- Textarea Input -->
                <div class="mb-4" x-show="type === 'textarea'" style="display: none;">
                    <label for="value_textarea" class="block text-sm font-medium text-slate-700">Value</label>
                    <textarea name="value" id="value_textarea" :disabled="type !== 'textarea'" rows="4" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 sm:text-sm">{{ old('value', $setting->type === 'textarea' ? $setting->value : '') }}</textarea>
                </div>

                <!-- Image Input -->
                <div class="mb-4" x-show="type === 'image'" style="display: none;">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Value (Image)</label>
                    <x-file-upload name="value" currentImage="{{ $setting->type === 'image' && $setting->value ? $setting->value : '' }}" />
                </div>

                <!-- Boolean Input -->
                <div class="mb-4" x-show="type === 'boolean'" style="display: none;">
                    <label for="value_boolean" class="block text-sm font-medium text-slate-700">Value</label>
                    <x-select name="value" :options="['1' => 'True', '0' => 'False']" selected="{{ old('value', $setting->value) }}" x-bind:disabled="type !== 'boolean'" />
                </div>

                @error('value')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror

                <div class="flex items-center gap-4 mt-6">
                    <button type="submit" class="px-4 py-2 bg-sky-500 text-white rounded-md hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-sky-500/50 transition-colors">
                        Update
                    </button>
                    <a href="{{ route('settings.index') }}" class="text-slate-600 hover:text-slate-900">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
