@php
    $projects = [
        'e-moszle' => [
            'title' => 'E-Moszle',
            'tagline' => 'Web-based Educational Puzzle Platform',
            'badge' => 'HKI Certified',
            'badgeStyle' => '',
            'image' => 'project-emoszle.png',
            'year' => '2024',
            'client' => 'Proyek Akademik',
            'role' => 'Full-Stack Developer',
            'stack' => ['PHP', 'Laravel', 'JavaScript', 'MySQL', 'Bootstrap'],
            'description' => 'E-Moszle adalah platform puzzle edukasi berbasis web yang menggabungkan gamifikasi dengan pembelajaran interaktif. Platform ini dirancang untuk meningkatkan motivasi belajar siswa melalui mekanisme puzzle yang menyenangkan namun tetap edukatif.',
            'features' => [
                'Sistem puzzle interaktif dengan tingkat kesulitan adaptif',
                'Gamifikasi lengkap: leaderboard, badge, dan reward system',
                'Dashboard analitik untuk memantau progress belajar',
                'Multi-level authentication untuk siswa dan guru',
                'Telah tersertifikasi Hak Kekayaan Intelektual (HKI)',
            ],
        ],
        'al-gaps' => [
            'title' => 'AL-GAPS',
            'tagline' => 'Adaptive Learning Management System',
            'badge' => 'LMS',
            'badgeStyle' => 'background:rgba(14,165,233,.12);color:var(--clr-primary)',
            'image' => 'project-algaps.png',
            'year' => '2024',
            'client' => 'Proyek Penelitian',
            'role' => 'Full-Stack Developer',
            'stack' => ['PHP', 'Laravel', 'React', 'MySQL', 'REST API'],
            'description' => 'AL-GAPS (Adaptive Learning - Gap Analysis Performance System) adalah Learning Management System yang secara cerdas menyesuaikan materi pembelajaran berdasarkan analisis performa dan kebutuhan individual setiap siswa secara real-time.',
            'features' => [
                'Algoritma adaptif untuk personalisasi jalur belajar',
                'Analisis gap kompetensi siswa secara otomatis',
                'Dashboard performa real-time untuk guru dan siswa',
                'Manajemen konten pembelajaran modular',
                'Sistem assessment dan evaluasi terintegrasi',
            ],
        ],
        'universe-payment' => [
            'title' => 'Universe Payment',
            'tagline' => 'School Payment Gateway Integration',
            'badge' => 'Payment',
            'badgeStyle' => 'background:rgba(16,185,129,.12);color:#059669',
            'image' => 'project-universe.png',
            'year' => '2024',
            'client' => 'Institusi Pendidikan',
            'role' => 'Backend Developer',
            'stack' => ['PHP', 'Laravel', 'MySQL', 'Payment API', 'JavaScript'],
            'description' => 'Universe Payment adalah sistem payment gateway terintegrasi yang dirancang khusus untuk institusi pendidikan. Sistem ini menyederhanakan seluruh proses pembayaran SPP dan administrasi keuangan sekolah dalam satu platform terpadu.',
            'features' => [
                'Integrasi multi-channel payment gateway',
                'Dashboard keuangan real-time untuk admin sekolah',
                'Sistem notifikasi otomatis untuk pembayaran',
                'Laporan keuangan dan rekonsiliasi otomatis',
                'Portal orang tua untuk monitoring pembayaran',
            ],
        ],
    ];

    $project = $projects[$slug] ?? null;

    if (!$project) {
        abort(404);
    }
@endphp

<x-layout>
    <x-slot:title>{{ $project['title'] }} — Yogi Nugraha</x-slot:title>

    {{-- Detail Header --}}
    <section class="page-header">
        <div class="container">
            <a href="{{ route('projects.index') }}" class="back-link">
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
                    <img src="{{ asset('images/' . $project['image']) }}" alt="{{ $project['title'] }}">
                </div>

                {{-- Right: Content --}}
                <div class="detail-content">
                    <span class="badge" @if($project['badgeStyle']) style="{{ $project['badgeStyle'] }}" @endif>{{ $project['badge'] }}</span>
                    <h1 class="detail-title">{{ $project['title'] }}</h1>
                    <p class="detail-tagline">{{ $project['tagline'] }}</p>

                    {{-- Meta Info --}}
                    <div class="detail-meta">
                        <div class="detail-meta-item">
                            <i data-lucide="calendar" style="width:16px;height:16px"></i>
                            <span>{{ $project['year'] }}</span>
                        </div>
                        <div class="detail-meta-item">
                            <i data-lucide="building-2" style="width:16px;height:16px"></i>
                            <span>{{ $project['client'] }}</span>
                        </div>
                        <div class="detail-meta-item">
                            <i data-lucide="user" style="width:16px;height:16px"></i>
                            <span>{{ $project['role'] }}</span>
                        </div>
                    </div>

                    {{-- Tech Stack --}}
                    <div class="detail-stack">
                        @foreach($project['stack'] as $tech)
                            <span class="detail-stack-tag">{{ $tech }}</span>
                        @endforeach
                    </div>

                    {{-- Description --}}
                    <div class="detail-section">
                        <h2>Deskripsi Proyek</h2>
                        <p>{{ $project['description'] }}</p>
                    </div>

                    {{-- Features --}}
                    <div class="detail-section">
                        <h2>Fitur Utama</h2>
                        <ul class="detail-features">
                            @foreach($project['features'] as $feature)
                                <li>
                                    <i data-lucide="check-circle-2" style="width:18px;height:18px;color:var(--clr-primary);min-width:18px"></i>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- CTA --}}
                    <div class="detail-actions">
                        <a href="mailto:yoginugraha@example.com" class="hero-cta">
                            <i data-lucide="send" style="width:18px;height:18px"></i>
                            Diskusi Proyek Serupa
                        </a>
                        <a href="{{ route('projects.index') }}" class="btn-outline" style="margin-top:0">
                            <i data-lucide="grid-2x2" style="width:16px;height:16px"></i>
                            Lihat Proyek Lain
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
