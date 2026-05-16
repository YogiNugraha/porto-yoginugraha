<x-layout>
    <x-slot:title>{{ $post->title }} — Yogi Nugraha</x-slot:title>
    <x-slot:description>{{ Str::limit(strip_tags($post->content), 150) }}</x-slot:description>

    <div class="container post-detail-container">
        <a href="{{ url('/#blog') }}" class="btn-back">
            <i data-lucide="arrow-left" style="width: 20px; height: 20px;"></i> Kembali ke Beranda
        </a>

        <article class="post-detail">
            <header class="post-detail-header">
                <h1 class="post-detail-title">
                    {{ $post->title }}
                </h1>
                <div class="post-detail-meta">
                    <span>
                        <i data-lucide="calendar" style="width: 16px; height: 16px;"></i>
                        {{ $post->created_at->format('d M Y') }}
                    </span>
                    <span>
                        <i data-lucide="user" style="width: 16px; height: 16px;"></i>
                        Yogi Nugraha
                    </span>
                </div>
            </header>

            @if($post->image)
            <div class="post-detail-image">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </div>
            @endif

            <div class="prose">
                {!! $post->content !!}
            </div>
        </article>
    </div>


</x-layout>
