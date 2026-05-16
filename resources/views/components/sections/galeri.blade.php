@props(['galleries' => []])
{{-- Gallery Kegiatan --}}
<section id="galeri">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Galeri</div>
            <h2 class="section-title">Gallery Kegiatan</h2>
            <p class="section-subtitle">Dokumentasi aktivitas profesional dan kegiatan kolaboratif.</p>
        </div>
    </div>

    <div class="gallery-marquee">
        <div class="gallery-track">
            @if(count($galleries) > 0)
                @foreach ($galleries as $gallery)
                <div class="gallery-item" style="padding: 0; overflow: hidden; position: relative;">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @if($gallery->title)
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.6); color: white; padding: 8px; text-align: center; font-size: 0.8rem; backdrop-filter: blur(4px);">
                        {{ $gallery->title }}
                    </div>
                    @endif
                </div>
                @endforeach

                {{-- Duplicate for infinite loop --}}
                @foreach ($galleries as $gallery)
                <div class="gallery-item" style="padding: 0; overflow: hidden; position: relative;">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @if($gallery->title)
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.6); color: white; padding: 8px; text-align: center; font-size: 0.8rem; backdrop-filter: blur(4px);">
                        {{ $gallery->title }}
                    </div>
                    @endif
                </div>
                @endforeach
            @else
                <div style="width: 100%; text-align: center; padding: 2rem; color: var(--text-muted);">
                    Belum ada foto galeri.
                </div>
            @endif
        </div>
    </div>
</section>
