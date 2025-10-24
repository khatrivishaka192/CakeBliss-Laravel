@extends('layout')

@section('title', isset($cake['name']) ? $cake['name'] . ' - Cake Bliss' : 'Cake Not Found - Cake Bliss')

@section('content')

    @if(!isset($cake))
        <div class="container py-5 text-center">
            <h3 class="text-danger mb-3">Cake not found 😢</h3>
            <a href="{{ url('/cakes') }}" class="btn btn-outline-pink">← Back to Cakes</a>
        </div>
    @else
        <div class="container my-5 cake-details-page">
            <div class="row justify-content-center align-items-center g-4">

                <!-- Cake Image -->
                <div class="col-md-5 text-center">
                    <img src="{{ asset($cake['image']) }}"
                         class="img-fluid cake-image"
                         alt="{{ $cake['name'] }}">
                </div>

                <!-- Cake Details -->
                <div class="col-md-6">
                    <h2 class="text-pink mb-3">{{ $cake['name'] }}</h2>
                    <p class="text-muted">{{ $cake['description'] }}</p>
                    <p><strong>Ingredients:</strong> {{ $cake['ingredients'] }}</p>

                    <form id="orderForm" class="mt-4">
                        <!-- Pound Selection -->
                        <div class="mb-3">
                            <label for="pound" class="form-label fw-semibold">Select Pound</label>
                            <select id="pound" class="form-select">
                                <option value="1">1 Pound</option>
                                <option value="2">2 Pounds</option>
                                <option value="3">3 Pounds</option>
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label for="qty" class="form-label fw-semibold">Select Quantity</label>
                            <input type="number" id="qty" class="form-control" min="1" value="1">
                        </div>

                        <!-- ✅ Special Instructions -->
                        <div class="mb-3">
                            <label for="instructions" class="form-label fw-semibold">
                                Special Instructions (optional)
                            </label>
                            <textarea id="instructions" class="form-control" rows="3"
                                      placeholder="e.g. Write 'Happy Birthday Ali' on top"></textarea>
                        </div>

                        <!-- Price Display -->
                        <div class="my-3">
                            <p class="fw-bold fs-5">Base Price: PKR {{ number_format($cake['price']) }}</p>
                            <p class="fw-bold fs-4 text-pink">
                                Total: PKR <span id="totalPrice">{{ number_format($cake['price']) }}</span>
                            </p>
                        </div>

                        <button type="button" id="placeOrder" class="btn btn-pink w-100">Place Order</button>
                    </form>
                </div>
            </div>

            <!-- Back to Cakes -->
            <div class="text-center mt-5">
                <a href="{{ url('/cakes') }}" class="btn btn-pink">← Back to Cakes</a>
            </div>

        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const basePrice = {{ $cake['price'] ?? 0 }};
            const poundSelect = document.getElementById('pound');
            const qtyInput = document.getElementById('qty');
            const totalPrice = document.getElementById('totalPrice');
            const orderBtn = document.getElementById('placeOrder');
            const instructionsInput = document.getElementById('instructions');

            function updatePrice() {
                const pounds = parseInt(poundSelect.value);
                const qty = parseInt(qtyInput.value);
                const total = basePrice * pounds * qty;
                totalPrice.textContent = total.toLocaleString();
            }

            poundSelect?.addEventListener('change', updatePrice);
            qtyInput?.addEventListener('input', updatePrice);

            orderBtn?.addEventListener('click', function () {
                const pounds = poundSelect.value;
                const qty = qtyInput.value;
                const total = basePrice * pounds * qty;
                const instructions = instructionsInput.value;

                const params = new URLSearchParams({
                    name: "{{ $cake['name'] }}",
                    price: basePrice,
                    pounds: pounds,
                    quantity: qty,
                    total: total,
                    instructions: instructions
                });

                window.location.href = `/checkout?${params.toString()}`;
            });
        });
    </script>
@endsection
