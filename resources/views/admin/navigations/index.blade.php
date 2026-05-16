<x-admin-layout>
    <x-slot name="header">Navigations Management</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-slate-900">Navigations</h2>
                <a href="{{ route('navigations.create') }}" class="px-4 py-2 bg-sky-500 text-white text-sm font-medium rounded-lg hover:bg-sky-600 transition-colors">Add New</a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200">{{ session('success') }}</div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-slate-600 uppercase bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-3">Label</th>
                            <th class="px-6 py-3">URL</th>
                            <th class="px-6 py-3">Position</th>
                            <th class="px-6 py-3">Order</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @forelse($navigations as $navigation)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $navigation->label }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ $navigation->url }}" target="_blank" class="text-sky-500 hover:underline">{{ $navigation->url }}</a>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-slate-100 text-slate-700 text-xs font-medium px-2.5 py-0.5 rounded-full">{{ ucfirst($navigation->position) }}</span>
                            </td>
                            <td class="px-6 py-4 text-slate-500">{{ $navigation->order }}</td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('navigations.edit', $navigation) }}" class="text-sky-500 hover:underline font-medium">Edit</a>
                                <form action="{{ route('navigations.destroy', $navigation) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-500">No records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $navigations->links() }}</div>
            </div>
        </div>
    </div>
</x-admin-layout>
