{{-- Sticky Navigation Bar --}}
<nav class="navbar" id="navbar">
    <div class="container">
        <a href="#hero" class="navbar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Yogi Nugraha Logo"> Yogi Nugraha
        </a>

        <div class="navbar-nav" id="navbarNav">
            <a href="#hero">Beranda</a>
            <a href="#karya">Karya</a>
            <a href="#tentang">Tentang</a>
            {{-- <a href="#blog">Blog Post</a>
            <a href="#galeri">Galeri</a> --}}
            <a href="#kontak">Kontak</a>
        </div>

        <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle navigation" aria-expanded="false">
            <i data-lucide="menu" class="navbar-toggle-icon navbar-toggle-icon--open"></i>
            <i data-lucide="x" class="navbar-toggle-icon navbar-toggle-icon--close"></i>
        </button>
    </div>
</nav>

{{-- Mobile overlay backdrop --}}
<div class="navbar-overlay" id="navbarOverlay"></div>
