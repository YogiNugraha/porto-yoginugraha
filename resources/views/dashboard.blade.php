<x-admin-layout>
    <x-slot name="header">Dashboard</x-slot>

    <div class="space-y-6">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            @php
                $statItems = [
                    ['label' => 'Total Posts', 'count' => $stats['posts'], 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20'],
                    ['label' => 'Projects', 'count' => $stats['projects'], 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['label' => 'Gallery Items', 'count' => $stats['galleries'], 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                    ['label' => 'Experiences', 'count' => $stats['experiences'], 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                    ['label' => 'Tech Stack', 'count' => $stats['skills'], 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                ];
            @endphp

            @foreach($statItems as $stat)
                <div class="bg-white rounded-xl shadow-sm p-6 border border-slate-200 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-sm font-medium text-slate-500">{{ $stat['label'] }}</h3>
                        <div class="p-2 bg-sky-50 rounded-lg text-sky-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"></path></svg>
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-slate-900">{{ $stat['count'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Projects -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-slate-900">Recent Projects</h3>
                    <a href="{{ route('projects.index') }}" class="text-sm text-sky-500 hover:text-sky-600 font-medium">View all &rarr;</a>
                </div>
                <div class="divide-y divide-slate-200">
                    @forelse($recentProjects as $project)
                        <div class="p-4 px-6 flex items-center justify-between hover:bg-slate-50 transition-colors">
                            <div class="flex items-center gap-4">
                                @if($project->image)
                                    <img src="{{ Storage::url($project->image) }}" class="w-12 h-12 rounded-lg object-cover bg-slate-100 border border-slate-200" alt="{{ $project->title }}">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div>
                                    <a href="{{ route('projects.edit', $project) }}" class="font-medium text-slate-900 hover:text-sky-500">{{ $project->title }}</a>
                                    <p class="text-sm text-slate-500">{{ $project->category ?? 'Uncategorized' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($project->is_starred)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        Starred
                                    </span>
                                @endif
                                @if($project->is_published)
                                    <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Published</span>
                                @else
                                    <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">Draft</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-slate-500">No projects found.</div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Posts -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-slate-900">Recent Posts</h3>
                    <a href="{{ route('posts.index') }}" class="text-sm text-sky-500 hover:text-sky-600 font-medium">View all &rarr;</a>
                </div>
                <div class="divide-y divide-slate-200">
                    @forelse($recentPosts as $post)
                        <div class="p-4 px-6 flex items-center justify-between hover:bg-slate-50 transition-colors">
                            <div class="flex flex-col">
                                <a href="{{ route('posts.edit', $post) }}" class="font-medium text-slate-900 hover:text-sky-500 truncate max-w-xs">{{ $post->title }}</a>
                                <p class="text-sm text-slate-500">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            @if($post->is_published)
                                <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Published</span>
                            @else
                                <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">Draft</span>
                            @endif
                        </div>
                    @empty
                        <div class="p-6 text-center text-slate-500">No posts found.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
