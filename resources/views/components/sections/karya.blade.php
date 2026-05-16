{{-- Proyek Pilihan --}}
<section id="karya">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Portofolio</div>
            <h2 class="section-title">Proyek Pilihan</h2>
            <p class="section-subtitle">Koleksi proyek terbaik yang telah saya kerjakan — mulai dari sistem perguruan
                tinggi
                hingga platform web skala nasional.</p>
        </div>

        <div class="project-grid">
            {{-- Card 1 --}}
            <a href="#" class="project-card fade-in" target="_blank">
                <div class="project-card-thumb">
                    <img src="{{ asset('images/sikn.png') }}" alt="SIKN Project">
                </div>
                <div class="project-card-body">
                    <div class="project-card-meta">
                        <span class="badge">Nasional</span>
                        <div class="arrow">
                            <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                        </div>
                    </div>
                    <h3>SIKN - Sistem Informasi Kurikulum Nasional v.2 <span style="color:#f59e0b">(Tahap
                            Pengerjaan)</span></h3>
                    <p>Situs resmi Kementerian Pendidikan Dasar dan Menengah yang berkaitan dengan Kurikulum
                        Nasional
                    </p>
                </div>
            </a>

            {{-- Card 2 --}}
            <a href="https://smepbdsi.kemenpora.go.id" class="project-card fade-in" target="_blank">
                <div class="project-card-thumb">
                    <img src="{{ asset('images/smep-bdsi.png') }}" alt="AL-GAPS Project">
                </div>
                <div class="project-card-body">
                    <div class="project-card-meta">
                        <span class="badge">Nasional</span>
                        {{-- <span class="badge" style="background:rgba(14,165,233,.12);color:var(--clr-primary)">LMS</span> --}}
                        <div class="arrow">
                            <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                        </div>
                    </div>
                    <h3>SMEP-BDSI</h3>
                    <p>Sistem Monitoring, Evaluasi dan Pelaporan - Big Data Sport Intelligence</p>
                </div>
            </a>

            {{-- Card 3 --}}
            <a href="https://sisaspro.kemenpora.go.id" class="project-card fade-in" target="_blank">
                <div class="project-card-thumb">
                    <img src="{{ asset('images/sisaspro.png') }}" alt="Universe Payment Project">
                </div>
                <div class="project-card-body">
                    <div class="project-card-meta">
                        <span class="badge">Nasional</span>
                        {{-- <span class="badge" style="background:rgba(16,185,129,.12);color:#059669">Payment</span> --}}
                        <div class="arrow">
                            <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                        </div>
                    </div>
                    <h3>SISASPRO</h3>
                    <p>Asisten Deputi Sarana dan Prasarana Olahraga Prestasi</p>
                </div>
            </a>

            {{-- Card 4 --}}
            <a href="https://popnas2025.id" class="project-card fade-in" target="_blank">
                <div class="project-card-thumb">
                    <img src="{{ asset('images/popnas-2025.png') }}" alt="SIKN Project">
                </div>
                <div class="project-card-body">
                    <div class="project-card-meta">
                        <span class="badge">Nasional</span>
                        <div class="arrow">
                            <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                        </div>
                    </div>
                    <h3>POPNAS XVII JAKARTA 2025</h3>
                    <p>Website Event Olaharga Nasional - Pekan Olahraga Pelajar Nasional di bawah naungan Kemenpora
                        RI.
                    </p>
                </div>
            </a>

            {{-- Card 5 --}}
            <a href="#" class="project-card fade-in" target="_blank">
                <div class="project-card-thumb">
                    <img src="{{ asset('images/dashboard.png') }}" alt="AL-GAPS Project">
                </div>
                <div class="project-card-body">
                    <div class="project-card-meta">
                        <span class="badge">Nasional</span>
                        <div class="arrow">
                            <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                        </div>
                    </div>
                    <h3>Dashboard Kemenpora</h3>
                    <p>Sistem agregasi data dan visualisasi performa atlet untuk mendukung monitoring prestasi
                        olahraga
                        nasional di bawah naungan Deputi 3 Kemenpora RI.</p>
                </div>
            </a>

            {{-- Card 6 --}}
            <a href="https://umat.umkuningan.ac.id" class="project-card fade-in" target="_blank">
                <div class="project-card-thumb">
                    <img src="{{ asset('images/umat.png') }}" alt="Universe Payment Project">
                </div>
                <div class="project-card-body">
                    <div class="project-card-meta">
                        <span class="badge" style="background:rgba(16,185,129,.12);color:#059669">Universitas</span>
                        <div class="arrow">
                            <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                        </div>
                    </div>
                    <h3>UMAT - Universal Muhammadiyah Application Test</h3>
                    <p>Sistem Ujian Computer Based Test (CBT) resmi Universitas Muhammadiyah Kuningan</p>
                </div>
            </a>
        </div>

        <div style="text-align:center">
            <a href="{{ route('projects.index') }}" class="btn-outline">
                Muat lebih banyak
                <i data-lucide="arrow-right" style="width:16px;height:16px"></i>
            </a>
        </div>
    </div>
</section>
