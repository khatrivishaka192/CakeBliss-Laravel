<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Cake Bliss — The sweetness of your happiness')</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Cake Bliss — Handmade cakes, pastries, and sweet creations baked fresh daily.">
    <meta name="keywords" content="Cake Bliss, bakery, cakes, desserts, royal bakery, cupcakes, pastry shop">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- ✅ Keep this single header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white cakebliss-header">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Cake Bliss" height="52" style="margin-right:12px;">
            <div>
                <strong style="font-size:1.15rem;color:#ff5fa2;">Cake Bliss</strong><br>
                <small style="color:#777;">The sweetness of your happiness</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/cakes') }}">Cakes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

{{-- ✅ Remove this duplicate include --}}
{{-- @include('partials.header') --}}

{{-- Page Content --}}
<main class="py-4">
    @yield('content')
</main>

{{-- Footer --}}
@include('partials.footer')

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
