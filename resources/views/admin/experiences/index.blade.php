<x-admin-layout>
    <x-slot name="header">Experiences & Education</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-900">Manage Experiences</h2>
        <a href="{{ route('experiences.create') }}" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-hover transition-colors">Add New Item</a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-600 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3">Type</th>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Company / Inst.</th>
                            <th class="px-6 py-3">Date Range</th>
                            <th class="px-6 py-3 text-center">Order</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($experiences as $experience)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                @if($experience->type === 'work')
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Work</span>
                                @else
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Education</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $experience->title }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $experience->company }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $experience->date_range }}</td>
                            <td class="px-6 py-4 text-center text-gray-500">{{ $experience->order }}</td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('experiences.edit', $experience) }}" class="text-primary hover:underline font-medium">Edit</a>
                                <form action="{{ route('experiences.destroy', $experience) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">No experiences found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $experiences->links() }}</div>
            </div>
        </div>
    </div>
</x-admin-layout>
