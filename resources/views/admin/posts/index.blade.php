<x-admin-layout>
    <x-slot name="header">Posts Management</x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-900">Posts</h2>
                <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-hover transition-colors">Add New</a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200">{{ session('success') }}</div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-600 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Created At</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($posts as $post)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $post->title }}</td>
                            <td class="px-6 py-4">
                                @if($post->is_published)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Published</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{ $post->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('posts.edit', $post) }}" class="text-primary hover:underline font-medium">Edit</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">No records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">{{ $posts->links() }}</div>
            </div>
        </div>
    </div>
</x-admin-layout>
