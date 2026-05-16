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
            @for ($i = 1; $i <= 10; $i++)
            <div class="gallery-item">
                <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;color:var(--clr-text-light);font-size:.8rem">
                    <i data-lucide="image" style="width:32px;height:32px;color:var(--clr-border-dark)"></i>
                    Kegiatan {{ $i }}
                </div>
            </div>
            @endfor

            {{-- Duplicate for infinite loop --}}
            @for ($i = 1; $i <= 10; $i++)
            <div class="gallery-item">
                <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px;color:var(--clr-text-light);font-size:.8rem">
                    <i data-lucide="image" style="width:32px;height:32px;color:var(--clr-border-dark)"></i>
                    Kegiatan {{ $i }}
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
