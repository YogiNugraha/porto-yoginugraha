<x-admin-layout>
    <x-slot name="header">
        Navigations Management
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Navigations</h2>
                <a href="{{ route('navigations.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
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
                            <th scope="col" class="px-6 py-3">Label</th>
                            <th scope="col" class="px-6 py-3">URL</th>
                            <th scope="col" class="px-6 py-3">Position</th>
                            <th scope="col" class="px-6 py-3">Order</th>
                            <th scope="col" class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($navigations as $navigation)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $navigation->label }}
                            </td>
                            <td class="px-6 py-4 text-blue-600 dark:text-blue-400">
                                <a href="{{ $navigation->url }}" target="_blank">{{ $navigation->url }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ ucfirst($navigation->position) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $navigation->order }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('navigations.edit', $navigation) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Edit</a>
                                <form action="{{ route('navigations.destroy', $navigation) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this navigation item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No records found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $navigations->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
