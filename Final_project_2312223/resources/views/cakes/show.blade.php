
@extends('layout')

@section('title', $cake->name . ' - Cake Bliss')

@section('content')

    <div class="container my-5">

        <div class="row g-4">

            <!-- Cake Image -->
            <div class="col-md-5 text-center">

                @php
                    if ($cake->image && file_exists(public_path('uploads/' . $cake->image))) {
                        $imageURL = asset('uploads/' . $cake->image);
                    } else {
                        $imageURL = asset('images/default-cake.png');
                    }
                @endphp

                <img src="{{ $imageURL }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $cake->name }}">
            </div>

            <!-- Cake Details -->
            <div class="col-md-7">

                <h2 class="text-pink fw-bold mb-3">{{ $cake->name }}</h2>

                <p class="text-muted">{{ $cake->description }}</p>

                <p><strong>Ingredients:</strong> {{ $cake->ingredients }}</p>

                <hr>

                <!-- Form Starts -->
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" value="{{ $cake->id }}">
                    <input type="hidden" name="name" value="{{ $cake->name }}">
                    <input type="hidden" name="image" value="{{ $cake->image }}">

                    <!-- Pound Selection -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Select Pound</label>
                        <select name="pounds" class="form-select">
                            <option value="1">1 Pound</option>
                            <option value="2">2 Pounds</option>
                            <option value="3">3 Pounds</option>
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Quantity</label>
                        <input type="number" name="quantity" class="form-control" min="1" value="1">
                    </div>

                    <!-- Add to Cart -->
                    <button type="submit" class="btn btn-pink w-100 mt-3">
                        🛒 Add to Cart
                    </button>
                </form>

                <!-- Back Button (NOW BELOW ADD TO CART) -->
                <a href="{{ route('frontend.cakes.index', 'all') }}"
                   class="btn btn-outline-pink w-100 mt-3">
                    ← Back to Cakes
                </a>

            </div>
        </div>

    </div>

@endsection
