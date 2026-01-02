
{{--@extends('layout')--}}

{{--@section('title', 'Your Cart - Cake Bliss')--}}

{{--@section('content')--}}

{{--    <div class="container my-5">--}}
{{--        <h2 class="text-center mb-4 text-pink">🛒 Your Cart</h2>--}}


{{--        @if(count($cart) === 0)--}}
{{--            <p class="text-center text-muted">Your cart is empty!</p>--}}
{{--            <div class="text-center mt-3">--}}
{{--                <a href="{{ url('/cakes') }}" class="btn btn-outline-pink">Back to Cakes</a>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table align-middle shadow-sm">--}}
{{--                    <thead class="table-light">--}}
{{--                    <tr>--}}

{{--                        <th>Cake Name</th>--}}
{{--                        <th>Price</th>--}}
{{--                        <th>Pounds</th>--}}
{{--                        <th>Quantity</th>--}}
{{--                        <th>Total</th>--}}
{{--                        <th></th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($cart as $item)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $item['name'] }}</td>--}}
{{--                            <td>PKR {{ number_format($item['price'], 0) }}</td>--}}
{{--                            <td>{{ $item['pounds'] }}</td>--}}
{{--                            <td>{{ $item['quantity'] }}</td>--}}
{{--                            <td>PKR {{ number_format($item['total'], 0) }}</td>--}}
{{--                            <td></td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}

{{--            <div class="text-end mt-4">--}}
{{--                <h5>Total: <span class="text-pink">PKR {{ number_format($total, 0) }}</span></h5>--}}
{{--                <a href="{{ url('/checkout') }}" class="btn btn-pink">Proceed to Checkout</a>--}}
{{--                <a href="{{ url('/cakes') }}" class="btn btn-outline-pink">➕ Add More Cakes</a>--}}
{{--            </div>--}}
{{--        @endif--}}


{{--    </div>--}}
{{--@endsection--}}
@extends('layout')

@section('title', 'Your Cart - Cake Bliss')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4 text-pink">🛒 Your Cart</h2>

        @if(count($cart) === 0)
            <p class="text-center text-muted">Your cart is empty!</p>
            <div class="text-center mt-3">
                <a href="{{ url('/cakes') }}" class="btn btn-outline-pink">Back to Cakes</a>
            </div>
        @else
            <div class="table-responsive shadow-sm rounded">
                <table class="table align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Photo</th>
                        <th>Cake Name</th>
                        <th>Price</th>
                        <th>Pounds</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $key => $item)
                        <tr>
                            <td><img src="{{ asset('uploads/' . $item['image']) }}" width="60" class="rounded"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>PKR {{ number_format($item['price'], 0) }}</td>
                            <td>{{ $item['pounds'] }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- Decrease --}}
                                    <form action="{{ route('cart.update', $key) }}" method="POST" class="me-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="decrease">
                                        <button class="btn btn-sm btn-outline-secondary">-</button>
                                    </form>

                                    <span>{{ $item['quantity'] }}</span>

                                    {{-- Increase --}}
                                    <form action="{{ route('cart.update', $key) }}" method="POST" class="ms-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="action" value="increase">
                                        <button class="btn btn-sm btn-outline-secondary">+</button>
                                    </form>
                                </div>
                            </td>
                            <td>PKR {{ number_format($item['total'], 0) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $key) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-4">
                <h5>Total: <span class="text-pink">PKR {{ number_format($total, 0) }}</span></h5>
                <a href="{{ url('/checkout') }}" class="btn btn-pink">Proceed to Checkout</a>
                <a href="{{ url('/cakes') }}" class="btn btn-outline-pink">➕ Add More Cakes</a>
            </div>
        @endif
    </div>
@endsection
