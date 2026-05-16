{{-- Footer (Laravel.com inspired) --}}
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="footer-brand-header">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                    <h3>Yogi Nugraha</h3>
                </div>
                <p>Result-oriented Web Developer yang fokus membangun solusi digital modern, scalable, dan berdampak.
                </p>
            </div>

            <div class="footer-col">
                <h4>Navigasi</h4>
                <a href="#hero">Beranda</a>
                <a href="#karya">Karya</a>
                <a href="#tentang">Tentang</a>
                {{-- <a href="#blog">Blog Post</a> --}}
            </div>

            <div class="footer-col">
                <h4>Lainnya</h4>
                {{-- <a href="#galeri">Galeri</a> --}}
                <a href="#ekosistem">Tech Stack</a>
                {{-- <a href="#mitra">Mitra</a> --}}
                <a href="#kontak">Kontak</a>
            </div>

            <div class="footer-col">
                <h4>Sosial</h4>
                <a href="https://linkedin.com/in/yogi-nugraha" target="_blank">LinkedIn</a>
                <a href="https://github.com/YogiNugraha" target="_blank">GitHub</a>
                <a href="mailto:ynugraha278@gmail.com">Email</a>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} Yogi Nugraha.
        </div>
    </div>
</footer>
