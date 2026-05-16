<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Yogi Nugraha — Result-oriented Web Developer specializing in Laravel, React, and modern web solutions.">
    <title>{{ $title ?? 'Yogi Nugraha — Web Developer' }}</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:title" content="{{ $title ?? 'Yogi Nugraha — Web Developer' }}" />
    <meta property="og:description"
        content="{{ $description ?? 'Yogi Nugraha — Web Developer dengan pengalaman dalam pengembangan sistem dan solusi digital untuk mendukung operasional organisasi' }}" />
    <meta property="og:image" content="{{ asset('images/profile.jpg') }}" />
    <meta property="og:site_name" content="Portofolio Yogi Nugraha" />
    <meta property="og:locale" content="id_ID" />

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@0.460.0/dist/umd/lucide.min.js" defer></script>

    {{-- Swiper.js --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    {{-- Navbar --}}
    <x-navbar />

    {{-- Main Content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />

    {{-- Main JS --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
