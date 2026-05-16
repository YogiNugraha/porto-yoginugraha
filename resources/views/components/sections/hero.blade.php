@props(['settings' => []])
{{-- Hero Section --}}
<section class="hero" id="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                {{-- <div class="hero-badge">
                    <span class="dot"></span> Available for Projects
                </div> --}}
                <div class="hero-badge-outline">
                    <i data-lucide="map-pin"></i>
                    {{ $settings['hero_location'] ?? 'Cirebon - Jawa Barat' }}
                </div>
                <h1>
                    {{ $settings['hero_name'] ?? 'Yogi Nugraha' }}<br>
                    <span class="highlight">{{ $settings['hero_title'] ?? 'Web Developer' }}</span>
                </h1>
                <p class="hero-sub">
                    {{ $settings['hero_subtitle'] ?? 'Membangun solusi web modern yang berdampak — dari konsep hingga deployment. Fokus pada performa, skalabilitas, dan pengalaman pengguna yang luar biasa.' }}
                </p>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <div class="number">{{ $settings['hero_stats_1_number'] ?? '10' }}<span>+</span></div>
                        <div class="label">{{ $settings['hero_stats_1_label'] ?? 'Web Apps Built' }}</div>
                    </div>
                    <div class="hero-stat">
                        <div class="number">{{ $settings['hero_stats_2_number'] ?? '3' }}<span>+</span></div>
                        <div class="label">{{ $settings['hero_stats_2_label'] ?? 'System Integrations' }}</div>
                    </div>
                    <div class="hero-stat">
                        <div class="number">{{ $settings['hero_stats_3_number'] ?? '1' }}<span>+</span></div>
                        <div class="label">{{ $settings['hero_stats_3_label'] ?? 'Years Experience' }}</div>
                    </div>
                </div>
                <a href="mailto:{{ $settings['hero_email'] ?? 'ynugraha278@gmail.com' }}" class="hero-cta">
                    <i data-lucide="send" style="width:18px;height:18px"></i>
                    Mulai Konsultasi
                </a>
            </div>
            <div class="hero-image">
                <div class="hero-image-wrapper">
                    @if(isset($settings['hero_image']) && $settings['hero_image'])
                        <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="{{ $settings['hero_name'] ?? 'Yogi Nugraha' }}">
                    @else
                        <img src="{{ asset('images/profile.JPG') }}" alt="{{ $settings['hero_name'] ?? 'Yogi Nugraha' }}">
                    @endif
                    <div class="hero-image-decoration"></div>
                </div>
            </div>
        </div>
    </div>
</section>
