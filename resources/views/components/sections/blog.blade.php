@props(['posts' => []])
{{-- Recent Blog Posts --}}
<section id="blog">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Blog</div>
            <h2 class="section-title">Recent Post</h2>
            <p class="section-subtitle">Tulisan terbaru seputar web development, teknologi, dan pengalaman profesional.</p>
        </div>

        <div class="swiper blog-swiper">
            <div class="swiper-wrapper">
                @forelse($posts as $post)
                <div class="swiper-slide">
                    <div class="blog-card">
                        <div class="blog-card-img">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <i data-lucide="file-text" style="width:48px;height:48px"></i>
                            @endif
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-card-date">{{ $post->created_at->format('d M Y') }}</div>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="blog-card-link">
                                Read More <i data-lucide="arrow-right" style="width:14px;height:14px"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="text-center" style="width: 100%; color: var(--text-muted);">Belum ada postingan blog.</p>
                @endforelse
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
