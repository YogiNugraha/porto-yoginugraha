<x-admin-layout>
    <x-slot name="header">
        Settings Management
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Settings</h2>
                <a href="{{ route('settings.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                    Add New
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Key</th>
                            <th scope="col" class="px-6 py-3">Value</th>
                            <th scope="col" class="px-6 py-3">Type</th>
                            <th scope="col" class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($settings as $setting)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $setting->key }}
                            </td>
                            <td class="px-6 py-4">
                                @if($setting->type === 'image')
                                    <img src="{{ asset('storage/' . $setting->value) }}" alt="image" class="h-10 w-auto rounded">
                                @elseif($setting->type === 'boolean')
                                    {{ $setting->value ? 'True' : 'False' }}
                                @else
                                    {{ Str::limit($setting->value, 50) }}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ ucfirst($setting->type) }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('settings.edit', $setting) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Edit</a>
                                <form action="{{ route('settings.destroy', $setting) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this setting?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No records found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $settings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
