
@extends('layout')

@section('title', 'Thank You - Cake Bliss')

@section('content')
    <div class="container text-center my-5 py-5">

        <div class="p-4 rounded-4 shadow-lg"
             style="background-color: #fff5f8; border: 1px solid #ffd6e8;">
            <h1 class="fw-bold mb-3" style="color: deeppink;">
                🎂 Thank You, {{ $order['customer_name'] ?? 'Sweet Customer' }}
            </h1>

            <p class="text-muted">
                Your delicious cake will be delivered soon to:<br>
                <span class="fw-semibold" style="color: deeppink;">
                {{ $order['address'] ?? '' }}
            </span>
            </p>
        </div>

        <div class="card mt-5 mx-auto shadow-sm border-0"
             style="max-width: 500px; background-color: #ffffff; border: 1px solid #ffd6e8;">
            <div class="card-body text-start p-4" style="color: #444;">

                <h4 class="text-center mb-4" style="color: deeppink;">🧁 Order Summary</h4>

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
                    @foreach($order['items'] ?? [] as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['pounds'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td class="text-end">Rs. {{ number_format($item['total']) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <hr>

                <h5 class="text-end fw-bold" style="color: deeppink;">
                    Total: Rs. {{ number_format($order['total'] ?? 0) }}
                </h5>

                <p class="mt-3">
                    <strong style="color: deeppink;">Special Instructions:</strong><br>
                    {{ $order['instructions'] ?? 'No special notes' }}
                </p>

            </div>
        </div>

        <div class="mt-5">
            <a href="{{ url('/') }}"
               class="btn fw-bold px-4 py-2 rounded-pill shadow"
               style="background-color: deeppink; color: white; border: none;">
                🏠 Back to Home
            </a>
        </div>

    </div>
@endsection
