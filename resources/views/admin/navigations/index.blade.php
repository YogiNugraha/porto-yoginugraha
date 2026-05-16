<x-admin-layout>
    <x-slot name="header">Navigations Management</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-900">Navigations</h2>
                <a href="{{ route('navigations.create') }}" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-hover transition-colors">Add New</a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200">{{ session('success') }}</div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-600 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3">Label</th>
                            <th class="px-6 py-3">URL</th>
                            <th class="px-6 py-3">Position</th>
                            <th class="px-6 py-3">Order</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($navigations as $navigation)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $navigation->label }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ $navigation->url }}" target="_blank" class="text-primary hover:underline">{{ $navigation->url }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ ucfirst($navigation->position) }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{ $navigation->order }}</td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('navigations.edit', $navigation) }}" class="text-primary hover:underline font-medium">Edit</a>
                                <form action="{{ route('navigations.destroy', $navigation) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">No records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $navigations->links() }}</div>
            </div>
        </div>
    </div>
</x-admin-layout>
