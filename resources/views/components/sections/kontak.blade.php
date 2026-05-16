{{-- Kontak --}}
<section id="kontak">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Get In Touch</div>
            <h2 class="section-title">Kontak</h2>
            <p class="section-subtitle">Punya project atau ide kolaborasi? Mari berdiskusi.</p>
        </div>

        @php
            $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
        @endphp
        <div class="kontak-grid">
            <div class="kontak-links">
                <a href="{{ $settings['linkedin_url'] ?? 'https://linkedin.com/in/yogi-nugraha' }}" target="_blank" class="kontak-link fade-in">
                    <div class="kontak-link-icon">
                        <i data-lucide="linkedin" style="width:20px;height:20px"></i>
                    </div>
                    <div>
                        <h4>LinkedIn</h4>
                        <p>{{ str_replace(['https://', 'http://', 'www.'], '', $settings['linkedin_url'] ?? 'linkedin.com/in/yogi-nugraha') }}</p>
                    </div>
                </a>

                <a href="{{ $settings['github_url'] ?? 'https://github.com/YogiNugraha' }}" target="_blank" class="kontak-link fade-in">
                    <div class="kontak-link-icon">
                        <i data-lucide="github" style="width:20px;height:20px"></i>
                    </div>
                    <div>
                        <h4>GitHub</h4>
                        <p>{{ str_replace(['https://', 'http://', 'www.'], '', $settings['github_url'] ?? 'github.com/YogiNugraha') }}</p>
                    </div>
                </a>

                <a href="{{ isset($settings['email_address']) ? 'mailto:'.$settings['email_address'] : 'mailto:ynugraha278@gmail.com' }}" class="kontak-link fade-in">
                    <div class="kontak-link-icon">
                        <i data-lucide="mail" style="width:20px;height:20px"></i>
                    </div>
                    <div>
                        <h4>Email</h4>
                        <p>{{ $settings['email_address'] ?? 'ynugraha278@gmail.com' }}</p>
                    </div>
                </a>
            </div>

            <div class="kontak-cta-card fade-in">
                <h3>Mari Berkolaborasi 🚀</h3>
                <p>Saya selalu terbuka untuk diskusi tentang proyek baru, ide kreatif, atau kesempatan untuk menjadi
                    bagian dari visi Anda.</p>
                <a href="{{ $settings['btn_konsultasi_link'] ?? 'mailto:ynugraha278@gmail.com' }}" class="kontak-cta-btn">
                    <i data-lucide="send" style="width:18px;height:18px"></i>
                    {{ $settings['btn_konsultasi_text'] ?? 'Contact Us' }}
                </a>
            </div>
        </div>
    </div>
</section>
