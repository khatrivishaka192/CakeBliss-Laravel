{{--@extends('layout')--}}

{{--@section('title', 'Checkout - Cake Bliss')--}}

{{--@section('content')--}}
{{--    <div class="container py-5">--}}
{{--        <h2 class="text-center text-pink mb-4 fw-bold">🧁 Checkout</h2>--}}

{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-7">--}}

{{--                <!-- Order Summary -->--}}
{{--                <div class="card shadow-sm p-4 rounded-4 mb-4">--}}
{{--                    <h4 class="text-center mb-4 text-pink">Order Summary</h4>--}}

{{--                    @if(count($cart) === 0)--}}
{{--                        <p class="text-center text-muted">Your cart is empty 😢</p>--}}
{{--                        <div class="text-center">--}}
{{--                            <a href="{{ url('/cakes') }}" class="btn btn-pink mt-3">Browse Cakes</a>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <table class="table align-middle">--}}
{{--                            <thead class="table-light">--}}
{{--                            <tr>--}}
{{--                                <th>Cake</th>--}}
{{--                                <th>Pounds</th>--}}
{{--                                <th>Qty</th>--}}
{{--                                <th class="text-end">Subtotal</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($cart as $item)--}}
{{--                                @php--}}
{{--                                    $subtotal = $item['price'] * $item['pounds'] * $item['quantity'];--}}
{{--                                @endphp--}}
{{--                                <tr>--}}
{{--                                    <td class="fw-semibold text-pink">{{ $item['name'] }}</td>--}}
{{--                                    <td>{{ $item['pounds'] }}</td>--}}
{{--                                    <td>{{ $item['quantity'] }}</td>--}}
{{--                                    <td class="text-end">PKR {{ number_format($subtotal) }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}

{{--                        <hr>--}}
{{--                        <h5 class="text-end text-pink fw-bold">Total: PKR {{ number_format($total) }}</h5>--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <!-- Customer Details -->--}}
{{--                @if(count($cart) > 0)--}}
{{--                    <div class="card shadow-sm p-4 rounded-4">--}}
{{--                        <h4 class="text-center mb-4 text-pink">Customer Details</h4>--}}

{{--                        <form action="{{ route('checkout.store') }}" method="POST">--}}
{{--                            @csrf--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label fw-semibold">Full Name</label>--}}
{{--                                <input type="text" name="name" class="form-control" required>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label fw-semibold">Email</label>--}}
{{--                                <input type="email" name="email" class="form-control" required>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label fw-semibold">Address</label>--}}
{{--                                <textarea name="address" class="form-control" rows="3" required></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label fw-semibold">Phone</label>--}}
{{--                                <input type="text" name="phone" class="form-control" required>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label fw-semibold">Special Instructions (optional)</label>--}}
{{--                                <textarea name="instructions" class="form-control" rows="3" placeholder="Add any final instructions here..."></textarea>--}}
{{--                            </div>--}}

{{--                            <button type="submit" class="btn btn-pink w-100">Confirm Order</button>--}}
{{--                        </form>--}}

{{--                        <div class="mt-3 text-center">--}}
{{--                            <a href="{{ url('/cakes') }}" class="btn btn-outline-pink">← Back to Cakes</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layout')

@section('title', 'Checkout - Cake Bliss')

@section('content')
    <div class="container py-5">
        <h2 class="text-center text-pink mb-4 fw-bold">🧁 Checkout</h2>

        <div class="row justify-content-center">
            <div class="col-md-7">

                {{-- Order Summary --}}
                <div class="card shadow-sm p-4 rounded-4 mb-4">
                    <h4 class="text-center mb-4 text-pink">Order Summary</h4>

                    @if(count($cart) === 0)
                        <p class="text-center text-muted">Your cart is empty 😢</p>
                        <div class="text-center">
                            <a href="{{ url('/cakes') }}" class="btn btn-pink mt-3">Browse Cakes</a>
                        </div>
                    @else
                        <table class="table align-middle">
                            <thead class="table-light">
                            <tr>
                                <th>Cake</th>
                                <th>Pounds</th>
                                <th>Qty</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                                @php
                                    $subtotal = $item['price'] * $item['pounds'] * $item['quantity'];
                                @endphp
                                <tr>
                                    <td class="fw-semibold text-pink">{{ $item['name'] }}</td>
                                    <td>{{ $item['pounds'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td class="text-end">PKR {{ number_format($subtotal) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <hr>
                        <h5 class="text-end text-pink fw-bold">Total: PKR {{ number_format($total) }}</h5>
                    @endif
                </div>

                {{-- Customer Details --}}
                @if(count($cart) > 0)
                    <div class="card shadow-sm p-4 rounded-4">
                        <h4 class="text-center mb-4 text-pink">Customer Details</h4>

                        <form action="{{ route('checkout.store') }}" method="POST">
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

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Special Instructions (optional)</label>
                                <textarea name="instructions" class="form-control" rows="3" placeholder="Add any final instructions here..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-pink w-100">Confirm Order</button>
                        </form>

                        <div class="mt-3 text-center">
                            <a href="{{ url('/cakes') }}" class="btn btn-outline-pink">← Back to Cakes</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
