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
                {{-- Post 1 --}}
                <div class="swiper-slide">
                    <div class="blog-card">
                        <div class="blog-card-img">
                            <i data-lucide="code-2" style="width:48px;height:48px"></i>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-card-date">12 Mei 2025</div>
                            <h3>Membangun REST API Scalable dengan Laravel 12</h3>
                            <p>Best practices dalam mendesain API yang clean, testable, dan siap untuk production-level traffic.</p>
                            <a href="#" class="blog-card-link">
                                Read More <i data-lucide="arrow-right" style="width:14px;height:14px"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Post 2 --}}
                <div class="swiper-slide">
                    <div class="blog-card">
                        <div class="blog-card-img">
                            <i data-lucide="layout-dashboard" style="width:48px;height:48px"></i>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-card-date">28 Apr 2025</div>
                            <h3>Panduan Lengkap Blade Components di Laravel</h3>
                            <p>Cara memanfaatkan komponen Blade untuk membangun UI yang reusable dan maintainable.</p>
                            <a href="#" class="blog-card-link">
                                Read More <i data-lucide="arrow-right" style="width:14px;height:14px"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Post 3 --}}
                <div class="swiper-slide">
                    <div class="blog-card">
                        <div class="blog-card-img">
                            <i data-lucide="git-branch" style="width:48px;height:48px"></i>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-card-date">15 Apr 2025</div>
                            <h3>Git Workflow untuk Tim Developer Pemula</h3>
                            <p>Strategi branching, commit conventions, dan code review yang efektif untuk kolaborasi tim.</p>
                            <a href="#" class="blog-card-link">
                                Read More <i data-lucide="arrow-right" style="width:14px;height:14px"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Post 4 --}}
                <div class="swiper-slide">
                    <div class="blog-card">
                        <div class="blog-card-img">
                            <i data-lucide="database" style="width:48px;height:48px"></i>
                        </div>
                        <div class="blog-card-body">
                            <div class="blog-card-date">02 Apr 2025</div>
                            <h3>Optimasi Database Query di Aplikasi Laravel</h3>
                            <p>Teknik indexing, eager loading, dan caching untuk meningkatkan performa query secara signifikan.</p>
                            <a href="#" class="blog-card-link">
                                Read More <i data-lucide="arrow-right" style="width:14px;height:14px"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
