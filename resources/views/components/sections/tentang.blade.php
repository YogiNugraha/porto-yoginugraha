{{-- Perjalanan Profesional & Pendidikan — Side by Side --}}
<section id="tentang">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Tentang Saya</div>
            <h2 class="section-title">Pengalaman & Pendidikan</h2>
            <p class="section-subtitle">Perjalanan profesional dan fondasi akademik yang membentuk keahlian saya.</p>
        </div>

        @php
            $works = \App\Models\Experience::where('type', 'work')->orderBy('order')->orderBy('created_at', 'desc')->get();
            $educations = \App\Models\Experience::where('type', 'education')->orderBy('order')->orderBy('created_at', 'desc')->get();
        @endphp

        <div class="about-grid">
            {{-- Left: Timeline --}}
            <div class="about-col">
                <h3 class="about-col-title">
                    <i data-lucide="briefcase" style="width:20px;height:20px"></i>
                    Perjalanan Profesional
                </h3>

                <div class="timeline">
                    @forelse($works as $work)
                        <div class="timeline-item fade-in">
                            <div class="timeline-dot"></div>
                            <div class="timeline-date">{{ $work->date_range }}</div>
                            <h3>{{ $work->title }}</h3>
                            <div class="company">{{ $work->company }}</div>
                            @if($work->description)
                                <p>{{ $work->description }}</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada pengalaman kerja ditambahkan.</p>
                    @endforelse
                </div>
            </div>

            {{-- Right: Education --}}
            <div class="about-col" id="pendidikan">
                <h3 class="about-col-title">
                    <i data-lucide="graduation-cap" style="width:20px;height:20px"></i>
                    Latar Belakang Pendidikan
                </h3>

                @forelse($educations as $edu)
                    <div class="edu-card fade-in">
                        <div class="edu-icon">
                            <i data-lucide="graduation-cap" style="width:26px;height:26px"></i>
                        </div>
                        <div class="edu-content">
                            <div class="edu-card-header">
                                <h3>{{ $edu->title }}</h3>
                                <div class="edu-date">{{ $edu->date_range }}</div>
                            </div>
                            <div class="uni">{{ $edu->company }}</div>
                            @if($edu->description)
                                <p>{{ $edu->description }}</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada pendidikan ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
