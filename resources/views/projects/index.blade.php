<x-layout>
    <x-slot:title>Semua Proyek — Yogi Nugraha</x-slot:title>

    {{-- Page Header --}}
    <section class="page-header">
        <div class="container">
            <a href="/" class="back-link">
                <i data-lucide="arrow-left" style="width:18px;height:18px"></i>
                Kembali ke Beranda
            </a>
            {{-- <div class="section-label">Portofolio</div> --}}
            <h1 class="section-title">Semua Proyek</h1>
            <p class="section-subtitle">Eksplorasi seluruh proyek yang telah saya kerjakan sepanjang perjalanan
                profesional.</p>
        </div>
    </section>

    {{-- Project Grid --}}
    <section style="padding-top:12px">
        <div class="container">
            <div class="project-grid">
                @forelse($projects as $project)
                    <a href="{{ route('public.projects.show', $project->slug) }}" class="project-card fade-in">
                        <div class="project-card-thumb">
                            @if ($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                            @else
                                <div class="project-card-thumb-placeholder">
                                    <i data-lucide="image" style="width:48px;height:48px"></i>
                                </div>
                            @endif
                        </div>
                        <div class="project-card-body">
                            <div class="project-card-meta">
                                @if ($project->category)
                                    <span class="badge"
                                        style="background:rgba(14,165,233,.12);color:var(--clr-primary)">{{ $project->category }}</span>
                                @endif
                                <div class="arrow">
                                    <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                                </div>
                            </div>
                            <h3>{{ $project->title }}</h3>
                            <p>{{ Str::limit($project->description ?? strip_tags($project->content), 120) }}</p>
                        </div>
                    </a>
                @empty
                    <p
                        style="text-align: center; width: 100%; grid-column: 1 / -1; color: var(--text-muted); padding: 2rem;">
                        Belum ada proyek yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>
