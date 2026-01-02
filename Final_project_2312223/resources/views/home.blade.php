@extends('layout')

@section('title', 'Home - Cake Bliss')

@section('content')



    <!--  Hero Section -->
    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-5 fw-bold text-pink">Delicious Cakes, Made with Love</h1>
                    <p class="lead text-muted">
                        From birthday cakes to wedding masterpieces — fresh ingredients, custom designs.
                    </p>
{{--                    <a href="{{ route('frontend.cakes.index', 'all') }}" class="btn btn-lg btn-pink">Explore Cakes</a>--}}

                    <a href="{{ route('frontend.cakes.index') }}" class="btn btn-lg btn-pink">
                        Explore Cakes
                    </a>

                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/hero-cake.jpg') }}" alt="Delicious cake" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- 🍰 Featured Cakes Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 text-pink">Best Sellers</h2>
            <div class="row g-4">

                <!-- Chocolate Bliss -->
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/cake1.jpg') }}" class="card-img-top" alt="Chocolate Bliss">
                        <div class="card-body text-center">
                            <h5 class="card-title text-pink">Chocolate Bliss</h5>
                            <p class="text-muted">Rich chocolate layers with silky ganache.</p>
                            <p class="fw-bold">Rs 2000</p>
                        </div>
                    </div>
                </div>

                <!-- Vanilla Dream -->
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/vanilla.jpg') }}" class="card-img-top" alt="Vanilla Dream">
                        <div class="card-body text-center">
                            <h5 class="card-title text-pink">Vanilla Dream</h5>
                            <p class="text-muted">Classic vanilla sponge with buttercream.</p>
                            <p class="fw-bold">Rs 1800</p>
                        </div>
                    </div>
                </div>

                <!-- Strawberry Heaven -->
                <div class="col-sm-6 col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset('images/strawberry.jpg') }}" class="card-img-top" alt="Strawberry Heaven">
                        <div class="card-body text-center">
                            <h5 class="card-title text-pink">Strawberry Heaven</h5>
                            <p class="text-muted">Soft vanilla cake topped with strawberries.</p>
                            <p class="fw-bold">Rs 2200</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- About Preview Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/about.jpeg') }}" alt="Our Bakery" class="img-fluid rounded-4 shadow about-img">
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <h2 class="fw-bold text-pink">About Cake Bliss</h2>
                    <p class="text-muted">
                        We started as a small home bakery with a dream — to make every celebration sweeter.
                        Today, Cake Bliss is a full-scale cake boutique known for taste, creativity, and heart.
                    </p>
                    <a href="{{ url('/about') }}" class="btn btn-outline-pink mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </section>


    <!-- 🎂 Contact Preview Section -->
    <section class="py-5" style="background-color: #fff5f8;">
        <div class="container text-center">
            <h2 class="fw-bold text-pink mb-3">Let’s Stay in Touch!</h2>
            <p class="text-muted mb-4">Have a question or want to order a custom cake? We’d love to hear from you.</p>
            <a href="{{ url('/contact') }}" class="btn btn-lg btn-pink">Contact Us</a>
        </div>
    </section>

@endsection
