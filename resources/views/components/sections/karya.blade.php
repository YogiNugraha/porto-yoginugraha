{{-- Proyek Pilihan --}}
<section id="karya">
    @php
        $starredProjects = \App\Models\Project::where('is_starred', true)
            ->where('is_published', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();
    @endphp

    <div class="container">
        <div class="section-header">
            <div class="section-label">Portofolio</div>
            <h2 class="section-title">Proyek Pilihan</h2>
            <p class="section-subtitle">Koleksi proyek terbaik yang telah saya kerjakan — mulai dari sistem perguruan
                tinggi
                hingga platform web skala nasional.</p>
        </div>

        <div class="project-grid">
            @forelse($starredProjects as $project)
                <a href="{{ route('public.projects.show', $project->slug) }}" class="project-card fade-in">
                    <div class="project-card-thumb">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                        @else
                            <div
                                style="width:100%;height:100%;background:#f3f4f6;display:flex;align-items:center;justify-content:center;color:#9ca3af;">
                                No Image
                            </div>
                        @endif
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-meta">
                            <span class="badge">{{ $project->category ?? 'Umum' }}</span>
                            <div class="arrow">
                                <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                            </div>
                        </div>
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>
                    </div>
                </a>
            @empty
                <div style="grid-column: 1 / -1; text-align:center; padding: 2rem; color:#6b7280;">
                    Belum ada proyek pilihan yang ditambahkan.
                </div>
            @endforelse
        </div>

        <div style="text-align:center">
            <a href="{{ route('public.projects.index') }}" class="btn-outline">
                Muat lebih banyak
                <i data-lucide="arrow-right" style="width:16px;height:16px"></i>
            </a>
        </div>
    </div>
</section>
