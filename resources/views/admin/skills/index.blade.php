<x-admin-layout>
    <x-slot name="header">Tech Stack</x-slot>

    <div class="mb-6 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-900">Manage Tech Stack (Ekosistem)</h2>
        <a href="{{ route('skills.create') }}" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-hover transition-colors">Add New Tech</a>
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
                            <th class="px-6 py-3">Icon</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3 text-center">Order</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($skills as $skill)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                @if($skill->image)
                                    @if(str_starts_with($skill->image, 'http'))
                                        <img src="{{ $skill->image }}" alt="{{ $skill->name }}" class="w-8 h-8 object-contain">
                                    @else
                                        <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}" class="w-8 h-8 object-contain">
                                    @endif
                                @else
                                    <div class="w-8 h-8 bg-gray-100 rounded flex items-center justify-center">
                                        <span class="text-xs text-gray-400">?</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $skill->name }}</td>
                            <td class="px-6 py-4 text-center text-gray-500">{{ $skill->order }}</td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('skills.edit', $skill) }}" class="text-primary hover:underline font-medium">Edit</a>
                                <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">No tech stack items found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $skills->links() }}</div>
            </div>
        </div>
    </div>
</x-admin-layout>
