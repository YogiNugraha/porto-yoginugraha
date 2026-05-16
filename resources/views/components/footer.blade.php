{{-- Footer (Laravel.com inspired) --}}
<footer class="footer">
    <div class="container">
        @php
            $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
        @endphp
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="footer-brand-header">
                    @if(isset($settings['logo']) && $settings['logo'])
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt=""> 
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt=""> 
                    @endif
                    <h3>{{ $settings['logo_title'] ?? 'Yogi Nugraha' }}</h3>
                </div>
                <p>{{ $settings['hero_desc'] ?? 'Result-oriented Web Developer yang fokus membangun solusi digital modern, scalable, dan berdampak.' }}</p>
            </div>

            <div class="footer-col">
                <h4>Navigasi</h4>
                @php
                    $footerNavs = \App\Models\Navigation::where('position', 'footer')->orderBy('order')->get();
                @endphp
                @if($footerNavs->count() > 0)
                    @foreach($footerNavs as $nav)
                        <a href="{{ $nav->url }}">{{ $nav->label }}</a>
                    @endforeach
                @else
                    <a href="#hero">Beranda</a>
                    <a href="#karya">Karya</a>
                    <a href="#tentang">Tentang</a>
                    <a href="#blog">Blog Post</a>
                    <a href="#galeri">Galeri</a>
                    <a href="#ekosistem">Tech Stack</a>
                    <a href="#kontak">Kontak</a>
                @endif
            </div>

            {{-- 
            <div class="footer-col">
                <h4>Lainnya</h4>
                <a href="#galeri">Galeri</a>
                <a href="#ekosistem">Tech Stack</a>
                <a href="#kontak">Kontak</a>
            </div> 
            --}}

            <div class="footer-col">
                <h4>Sosial</h4>
                <a href="{{ $settings['linkedin_url'] ?? 'https://linkedin.com/in/yogi-nugraha' }}" target="_blank">LinkedIn</a>
                <a href="{{ $settings['github_url'] ?? 'https://github.com/YogiNugraha' }}" target="_blank">GitHub</a>
                <a href="{{ isset($settings['email_address']) ? 'mailto:'.$settings['email_address'] : 'mailto:ynugraha278@gmail.com' }}">Email</a>
            </div>
        </div>

        <div class="footer-bottom">
            {{ $settings['footer_copyright'] ?? '© ' . date('Y') . ' Yogi Nugraha. All rights reserved.' }}
        </div>
    </div>
</footer>
