@extends('layout')

@section('title', 'About Us - Cake Bliss')

@section('content')
    <div class="container my-5">

        <!-- Hero Section -->
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: deeppink;">About Cake Bliss</h1>
            <p class="text-muted fs-5">Where every bite feels like bliss </p>
        </div>

        <!-- Our Story -->
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/about.jpeg') }}"
                     alt="Our Bakery"
                     class="img-fluid rounded-4 shadow about-img">
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <h3 class="fw-bold" style="color: deeppink;">Our Story</h3>
                <p>
                    Cake Bliss began with one goal — to make every celebration memorable through the magic of sweetness.
                    What started as a cozy home bakery has blossomed into a full-scale cake boutique loved for its taste,
                    creativity, and heartwarming designs.
                </p>
                <p>
                    From birthdays to weddings, we bake happiness with love, precision, and a dash of pink perfection!
                </p>
            </div>
        </div>


        <!-- Our Specialties Section -->
        <div class="py-5 px-4 rounded-4 shadow-sm text-center" style="background-color:#fff5f8;">
            <h3 class="fw-bold mb-4" style="color: deeppink;">Our Specialties</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-white shadow-sm h-100">

                        <h5 class="fw-bold text-pink">Regular Cakes</h5>
                        <p class="text-muted small">
                            Classic favorites baked fresh daily — perfect for birthdays, gatherings, or a little self-love treat!
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-white shadow-sm h-100">

                        <h5 class="fw-bold text-pink">Customized Cakes</h5>
                        <p class="text-muted small">
                            Personalized just for you — choose your design, flavor, and style to match your imagination.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 rounded-4 bg-white shadow-sm h-100">
                        <h5 class="fw-bold text-pink">Wedding Cakes</h5>
                        <p class="text-muted small">
                            Elegant, luxurious, and unforgettable — our handcrafted wedding cakes make your special day magical.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="mt-5 text-center">
            <h3 class="fw-bold" style="color: deeppink;">Meet Our Bakers</h3>
            <p class="text-muted">The creative souls behind every cake masterpiece </p>
            <div class="row mt-4">
                <div class="col-md-4">
                    <img src="{{ asset('images/baker1.jpeg') }}" class="img-fluid rounded-circle mb-3 shadow" height="150" width="150" alt="Baker 1">
                    <h6 class="fw-bold text-pink">Kajal Rakhria</h6>
                    <p class="text-muted small">Wedding Cake Specialist</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/baker2.jpeg') }}" class="img-fluid rounded-circle mb-3 shadow" height="150" width="150" alt="Baker 2">
                    <h6 class="fw-bold text-pink">Vishaka Khatri</h6>
                    <p class="text-muted small">Customized Cake Designer</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/baker3.jpeg') }}" class="img-fluid rounded-circle mb-3 shadow" height="150" width="150" alt="Baker 3">
                    <h6 class="fw-bold text-pink">Hummad Malik</h6>
                    <p class="text-muted small">Regular Cake & Dessert Expert</p>
                </div>
            </div>
        </div>

    </div>
@endsection
