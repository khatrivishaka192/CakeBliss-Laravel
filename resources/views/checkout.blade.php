@extends('layout')

@section('title', 'Checkout - Cake Bliss')

@section('content')
    <div class="container py-5">
        <h2 class="text-center text-pink mb-4">Checkout</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4 rounded-4">
                    <h4 class="text-center mb-4">🧁 Order Summary</h4>

                    <p><strong>Cake:</strong> {{ $cake['name'] }}</p>
                    <p><strong>Pound(s):</strong> {{ $cake['pounds'] }}</p>
                    <p><strong>Quantity:</strong> {{ $cake['quantity'] }}</p>
                    <p><strong>Price per Cake:</strong> PKR {{ $cake['price'] }}</p>

                    @if(!empty($cake['instructions']))
                        <p><strong>Special Instructions:</strong> {{ $cake['instructions'] }}</p>
                    @endif

                    <hr>
                    <h5 class="text-pink fw-bold">Total: PKR {{ $cake['total'] }}</h5>

                    <form action="{{ route('checkout.store') }}" method="POST" class="mt-4">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea name="address" class="form-control" rows="3" required></textarea>
                        </div>

                        <!-- ✅ Editable Special Instructions -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Special Instructions (optional)</label>
                            <textarea name="instructions" class="form-control" rows="3" placeholder="Add any final instructions here...">{{ $cake['instructions'] ?? '' }}</textarea>
                        </div>

                        <!-- Hidden inputs to pass cake info -->
                        <input type="hidden" name="cake_name" value="{{ $cake['name'] }}">
                        <input type="hidden" name="pounds" value="{{ $cake['pounds'] }}">
                        <input type="hidden" name="quantity" value="{{ $cake['quantity'] }}">
                        <input type="hidden" name="price" value="{{ $cake['price'] }}">
                        <input type="hidden" name="total" value="{{ $cake['total'] }}">

                        <button type="submit" class="btn btn-pink w-100">Confirm Order</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="{{ url('/cakes') }}" class="btn btn-outline-pink">
                            ← Back to Cakes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
