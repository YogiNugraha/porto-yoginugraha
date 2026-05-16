<x-admin-layout>
    <x-slot name="header">
        Tech Stack
    </x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Manage Tech Stack (Ekosistem)</h2>
        <a href="{{ route('skills.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg">
            Add New Tech
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Icon</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3 text-center">Order</th>
                            <th scope="col" class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skills as $skill)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    @if($skill->image)
                                        @if(str_starts_with($skill->image, 'http'))
                                            <img src="{{ $skill->image }}" alt="{{ $skill->name }}" class="w-8 h-8 object-contain">
                                        @else
                                            <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}" class="w-8 h-8 object-contain">
                                        @endif
                                    @else
                                        <div class="w-8 h-8 bg-gray-200 rounded flex items-center justify-center">
                                            <span class="text-xs text-gray-500">?</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $skill->name }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $skill->order }}
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('skills.edit', $skill) }}" class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline">Edit</a>
                                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No tech stack items found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $skills->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
