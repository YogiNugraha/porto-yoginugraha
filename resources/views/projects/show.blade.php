
<x-layout>
    <x-slot:title>{{ $project->title }} — Yogi Nugraha</x-slot:title>

    {{-- Detail Header --}}
    <section class="page-header">
        <div class="container">
            <a href="{{ route('public.projects.index') }}" class="back-link">
                <i data-lucide="arrow-left" style="width:18px;height:18px"></i>
                Kembali ke Semua Proyek
            </a>
        </div>
    </section>

    {{-- Project Detail --}}
    <section style="padding-top:0">
        <div class="container">
            <div class="detail-layout">
                {{-- Left: Image --}}
                <div class="detail-image fade-in">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    @else
                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: var(--clr-primary-light); color: var(--clr-primary);">
                            <i data-lucide="image" style="width:64px;height:64px"></i>
                        </div>
                    @endif
                </div>

                {{-- Right: Content --}}
                <div class="detail-content">
                    @if($project->category)
                    <span class="badge" style="background:rgba(14,165,233,.12);color:var(--clr-primary)">{{ $project->category }}</span>
                    @endif
                    <h1 class="detail-title">{{ $project->title }}</h1>
                    @if($project->tagline)
                    <p class="detail-tagline">{{ $project->tagline }}</p>
                    @endif

                    {{-- Meta Info --}}
                    <div class="detail-meta">
                        @if($project->year)
                        <div class="detail-meta-item">
                            <i data-lucide="calendar" style="width:16px;height:16px"></i>
                            <span>{{ $project->year }}</span>
                        </div>
                        @endif
                        @if($project->client)
                        <div class="detail-meta-item">
                            <i data-lucide="building-2" style="width:16px;height:16px"></i>
                            <span>{{ $project->client }}</span>
                        </div>
                        @endif
                        @if($project->role)
                        <div class="detail-meta-item">
                            <i data-lucide="user" style="width:16px;height:16px"></i>
                            <span>{{ $project->role }}</span>
                        </div>
                        @endif
                    </div>

                    {{-- Tech Stack --}}
                    @if($project->stack)
                    <div class="detail-stack">
                        @foreach(explode(',', $project->stack) as $tech)
                            <span class="detail-stack-tag">{{ trim($tech) }}</span>
                        @endforeach
                    </div>
                    @endif

                    @if($project->description)
                    {{-- Description --}}
                    <div class="detail-section">
                        <h2>Deskripsi Singkat</h2>
                        <p>{{ $project->description }}</p>
                    </div>
                    @endif

                    {{-- Content --}}
                    @if($project->content)
                    <div class="detail-section prose" style="margin-top: 2rem;">
                        {!! $project->content !!}
                    </div>
                    @endif

                    {{-- CTA --}}
                    <div class="detail-actions">
                        @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="hero-cta">
                            <i data-lucide="external-link" style="width:18px;height:18px"></i>
                            Kunjungi Proyek
                        </a>
                        @endif
                        <a href="{{ route('public.projects.index') }}" class="btn-outline" style="margin-top:0">
                            <i data-lucide="grid-2x2" style="width:16px;height:16px"></i>
                            Lihat Proyek Lain
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
