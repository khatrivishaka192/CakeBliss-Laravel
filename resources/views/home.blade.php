@extends('layout')

@section('title', 'Home - Cake Bliss')

@section('content')

    {{-- ✅ Success Message (shows after order placed) --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center mx-auto mt-3"
             style="max-width: 600px; font-size: 16px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        {{-- Auto-hide success message after few seconds --}}
        <script>
            setTimeout(() => {
                const alertBox = document.querySelector('.alert');
                if (alertBox) alertBox.classList.remove('show');
            }, 4000);
        </script>
    @endif


    <!-- Hero Section -->
    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-5 fw-bold text-pink">Delicious Cakes, Made with Love</h1>
                    <p class="lead text-muted">
                        From birthday cakes to wedding masterpieces — fresh ingredients, custom designs.
                    </p>
                    <a href="{{ url('/cakes') }}" class="btn btn-lg btn-pink">Explore Cakes</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/hero-cake.jpg') }}" alt="Delicious cake" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cakes Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 text-pink">Best Sellers</h2>
            <div class="row g-4">
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/cake1.jpg') }}" class="card-img-top" alt="Chocolate Bliss">
                        <div class="card-body text-center">
                            <h5 class="card-title text-pink">Chocolate Bliss</h5>
                            <p class="text-muted">Rich chocolate layers with silky ganache.</p>
                            <p class="fw-bold">PKR 2000</p>
                            <a href="{{ url('/cake/1') }}" class="btn btn-pink mt-2">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/vanilla.jpg') }}" class="card-img-top" alt="Vanilla Dream">
                        <div class="card-body text-center">
                            <h5 class="card-title text-pink">Vanilla Dream</h5>
                            <p class="text-muted">Classic vanilla sponge with buttercream.</p>
                            <p class="fw-bold">PKR 1800</p>
                            <a href="{{ url('/cake/2') }}" class="btn btn-pink mt-2">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('images/strawberry.jpg') }}" class="card-img-top" alt="Strawberry Heaven">
                        <div class="card-body text-center">
                            <h5 class="card-title text-pink">Strawberry Heaven</h5>
                            <p class="text-muted">Soft vanilla cake topped with strawberries.</p>
                            <p class="fw-bold">PKR 2200</p>
                            <a href="{{ url('/cake/3') }}" class="btn btn-pink mt-2">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
