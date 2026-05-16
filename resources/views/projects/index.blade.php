<x-layout>
    <x-slot:title>Semua Proyek — Yogi Nugraha</x-slot:title>

    {{-- Page Header --}}
    <section class="page-header">
        <div class="container">
            <a href="/" class="back-link">
                <i data-lucide="arrow-left" style="width:18px;height:18px"></i>
                Kembali ke Beranda
            </a>
            {{-- <div class="section-label">Portofolio</div> --}}
            <h1 class="section-title">Semua Proyek</h1>
            <p class="section-subtitle">Eksplorasi seluruh proyek yang telah saya kerjakan sepanjang perjalanan
                profesional.</p>
        </div>
    </section>

    {{-- Project Grid --}}
    <section style="padding-top:12px">
        <div class="container">
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
                            <span class="badge"
                                style="background:rgba(16,185,129,.12);color:#059669">Universitas</span>
                            <div class="arrow">
                                <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                            </div>
                        </div>
                        <h3>UMAT - Universal Muhammadiyah Application Test</h3>
                        <p>Sistem Ujian Computer Based Test (CBT) resmi Universitas Muhammadiyah Kuningan</p>
                    </div>
                </a>

                {{-- Card 7 --}}
                <a href="https://survey.umkuningan.ac.id" class="project-card fade-in" target="_blank">
                    <div class="project-card-thumb">
                        <img src="{{ asset('images/survey.png') }}" alt="Universe Payment Project">
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-meta">
                            <span class="badge"
                                style="background:rgba(16,185,129,.12);color:#059669">Universitas</span>
                            <div class="arrow">
                                <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                            </div>
                        </div>
                        <h3>Survey Kepuasan Mahasiswa</h3>
                        <p>Platform survey kepuasan mahasiswa resmi Universitas Muhammadiyah Kuningan</p>
                    </div>
                </a>

                {{-- Card 8 --}}
                <a href="https://simfoni.umkuningan.ac.id" class="project-card fade-in" target="_blank">
                    <div class="project-card-thumb">
                        <img src="{{ asset('images/simfoni.png') }}" alt="Universe Payment Project">
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-meta">
                            <span class="badge"
                                style="background:rgba(16,185,129,.12);color:#059669">Universitas</span>
                            <div class="arrow">
                                <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                            </div>
                        </div>
                        <h3>SIMFONI - Sistem Informasi Alumni dan Tracer Study</h3>
                        <p>Sistem Informasi Alumni dan Tracer Study resmi Universitas Muhammadiyah Kuningan</p>
                    </div>
                </a>

                {{-- Card 9 --}}
                <a href="https://app.mahakaindonesia.com" class="project-card fade-in" target="_blank">
                    <div class="project-card-thumb">
                        <img src="{{ asset('images/tes-iq.png') }}" alt="Universe Payment Project">
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-meta">
                            <span class="badge" style="background:rgba(16, 24, 185, 0.12);color:#050c96">Umum</span>
                            <div class="arrow">
                                <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                            </div>
                        </div>
                        <h3>Sistem Tes IQ Anak</h3>
                        <p>Sistem untuk tes iq anak terintegrasi AI dibawah naungan Mahaka Training Center.</p>
                    </div>
                </a>

                {{-- Card 10 --}}
                <a href="https://emoszle.com" class="project-card fade-in" target="_blank">
                    <div class="project-card-thumb">
                        <img src="{{ asset('images/emoszle.png') }}" alt="Universe Payment Project">
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-meta">
                            <span class="badge" style="background:rgba(16, 24, 185, 0.12);color:#050c96">Umum</span>
                            <div class="arrow">
                                <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                            </div>
                        </div>
                        <h3>E-Moszle - Electronic-Module Traditional Sports and Games Puzzle</h3>
                        <p>Cara menyenangkan untuk mengenalkan permainan tradisional Indonesia kepada anak-anak melalui
                            puzzle yang interaktif dan mendidik.</p>
                    </div>
                </a>

                {{-- Card 11 --}}
                <a href="https://simfoni.umkuningan.ac.id" class="project-card fade-in" target="_blank">
                    <div class="project-card-thumb">
                        <img src="{{ asset('images/pmb.png') }}" alt="Universe Payment Project">
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-meta">
                            <span class="badge"
                                style="background:rgba(16,185,129,.12);color:#059669">Universitas</span>
                            <div class="arrow">
                                <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                            </div>
                        </div>
                        <h3>Sistem PMB</h3>
                        <p>Sistem Informasi PMB resmi Universitas Muhammadiyah Kuningan</p>
                    </div>
                </a>

                {{-- Card 12 --}}
                <a href="https://homeofmath.id" class="project-card fade-in" target="_blank">
                    <div class="project-card-thumb">
                        <img src="{{ asset('images/homeofmath.png') }}" alt="Universe Payment Project">
                    </div>
                    <div class="project-card-body">
                        <div class="project-card-meta">
                            <span class="badge" style="background:rgba(16, 24, 185, 0.12);color:#050c96">Umum</span>
                            <div class="arrow">
                                <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i>
                            </div>
                        </div>
                        <h3>Home of Math</h3>
                        <p>Platform edukasi yang mengubah cara pandang Anda terhadap matematika—dari subjek yang
                            menakutkan menjadi petualangan yang menyenangkan</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
</x-layout>
