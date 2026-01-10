<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Batam Campus Expo' }}</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Batam Campus Expo - Pameran pendidikan terbesar di Kepulauan Riau. Temukan universitas dan jurusan impian Anda.">
    <meta name="keywords" content="Batam Campus Expo, pameran pendidikan, universitas, jurusan, Kepulauan Riau">
    <meta name="author" content="Batam Campus Expo">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $title ?? 'Batam Campus Expo' }}">
    <meta property="og:description" content="Batam Campus Expo - Pameran pendidikan terbesar di Kepulauan Riau">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Batam Campus Expo' }}">
    <meta name="twitter:description" content="Batam Campus Expo - Pameran pendidikan terbesar di Kepulauan Riau">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Sancreek&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>

<body class="bg-transparent min-h-screen flex flex-col">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-[#D32F2F] text-white px-4 py-2 rounded-md z-50">
        Skip to main content
    </a>
    
    <!-- NAVBAR -->
    <nav class="relative z-[999]" role="navigation" aria-label="Main navigation">
        @include('components.layout.navbar')
    </nav>

    <!-- MAIN CONTENT -->
    <main id="main-content" class="flex-grow" role="main">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10" role="contentinfo">
        @include('components.layout.footer', ['nohp' => $nohp, 'lokasi' => $lokasi])
    </footer>
    
    @stack('scripts')
</body>
</html>