@extends('layout')

@section('title', 'Cakes - Cake Bliss')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Our Delicious Cakes</h2>

        <!-- Regular Cakes -->
        <h3 id="regular" class="mb-3 text-pink">Regular Cakes</h3>
        <div class="row g-4 mb-5">
            <!-- Vanilla Cake -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/vanilla.jpg') }}" class="card-img-top" alt="Vanilla Cake">
                    <div class="card-body text-center">
                        <h5 class="card-title">Vanilla Dream</h5>
                        <p class="text-muted">Soft vanilla sponge with buttercream frosting.</p>
                        <p class="fw-bold">PKR 1800</p>
                    </div>
                </div>
            </div>

            <!-- Chocolate Cake -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/cake1.jpg') }}" class="card-img-top" alt="Chocolate Cake">
                    <div class="card-body text-center">
                        <h5 class="card-title">Chocolate Bliss</h5>
                        <p class="text-muted">Rich chocolate sponge layered with cream.</p>
                        <p class="fw-bold">PKR 2000</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Customized Cakes -->
        <h3 id="custom" class="mb-3 text-pink">Customized Cakes</h3>
        <div class="row g-4 mb-5">
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/birthday.jpg') }}" class="card-img-top" alt="Birthday Cake">
                    <div class="card-body text-center">
                        <h5 class="card-title">Birthday Special</h5>
                        <p class="text-muted">Your favourite flavour with name or theme decoration.</p>
                        <p class="fw-bold">PKR 2500</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/cartoon.jpg') }}" class="card-img-top" alt="Cartoon Cake">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cartoon Theme</h5>
                        <p class="text-muted">Fun custom designs for kids’ birthdays.</p>
                        <p class="fw-bold">PKR 2700</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wedding Cakes -->
        <h3 id="wedding" class="mb-3 text-pink">Wedding Cakes</h3>
        <div class="row g-4">
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/wedding1.jpg') }}" class="card-img-top" alt="Wedding Cake">
                    <div class="card-body text-center">
                        <h5 class="card-title">Royal Tier</h5>
                        <p class="text-muted">3-tier white fondant cake for elegant weddings.</p>
                        <p class="fw-bold">PKR 4500</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/wedding2.jpg') }}" class="card-img-top" alt="Floral Cake">
                    <div class="card-body text-center">
                        <h5 class="card-title">Floral Elegance</h5>
                        <p class="text-muted">Buttercream roses and gold accents.</p>
                        <p class="fw-bold">PKR 4800</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
