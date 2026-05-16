{{-- Ekosistem Teknologi --}}
<section id="ekosistem">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Tech Stack</div>
            <h2 class="section-title">Ekosistem Teknologi</h2>
            <p class="section-subtitle">Tools dan teknologi yang saya gunakan sehari-hari untuk membangun solusi digital.
            </p>
        </div>
    </div>

    @php
        $skills = \App\Models\Skill::orderBy('order')->orderBy('created_at', 'desc')->get();
    @endphp

    <div class="marquee-wrapper">
        <div class="marquee-track">
            @if($skills->count() > 0)
                {{-- Loop twice for infinite marquee effect --}}
                @foreach([1, 2] as $i)
                    @foreach($skills as $skill)
                        <div class="marquee-item">
                            @if($skill->image)
                                @if(str_starts_with($skill->image, 'http'))
                                    <img src="{{ $skill->image }}" alt="{{ $skill->name }}">
                                @else
                                    <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}">
                                @endif
                            @endif
                            <span>{{ $skill->name }}</span>
                        </div>
                    @endforeach
                @endforeach
            @else
                <div class="text-center w-full py-8 text-gray-500">
                    Belum ada tech stack yang ditambahkan.
                </div>
            @endif
        </div>
    </div>
</section>
