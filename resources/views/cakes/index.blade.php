@extends('layout')

@section('title', 'Our Cakes - Cake Bliss')

@section('content')
    <div class="container my-5">

        <!-- Header section with title & search -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-pink mb-3 mb-md-0">Our Delicious Cakes</h2>
            <div class="d-flex" style="max-width: 350px;">
                <input type="text" id="searchInput" class="form-control me-2" placeholder="Search cakes...">
                <button class="btn btn-pink" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>

        <!-- Cake Category Navigation -->
        <ul class="nav nav-pills justify-content-center mb-5">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cakes/regular') ? 'active' : '' }}" href="{{ url('/cakes/regular') }}">Regular Cakes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cakes/customized') ? 'active' : '' }}" href="{{ url('/cakes/customized') }}">Customized Cakes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cakes/wedding') ? 'active' : '' }}" href="{{ url('/cakes/wedding') }}">Wedding Cakes</a>
            </li>
        </ul>

        <!-- Cakes Grid -->
        <div class="row g-4" id="cakeGrid">
            @foreach ($cakes as $cake)
                <div class="col-sm-6 col-md-4 col-lg-3 cake-card" data-name="{{ strtolower($cake['name']) }}">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <img src="{{ asset($cake['image']) }}" class="card-img-top" alt="{{ $cake['name'] }}">
                        <div class="card-body text-center">
                            <h5 class="card-title text-pink fw-semibold">{{ $cake['name'] }}</h5>
                            <p class="text-muted small mb-1">{{ $cake['description'] }}</p>
                            <p class="fw-bold mb-3">PKR {{ $cake['price'] }}</p>
                            <a href="{{ route('cakes.show', $cake['id']) }}" class="btn btn-outline-pink btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Live search filter
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            const cards = document.querySelectorAll('.cake-card');
            let found = false;

            cards.forEach(card => {
                const name = card.getAttribute('data-name');
                if (name.includes(query)) {
                    card.style.display = 'block';
                    found = true;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show message if no cakes match
            let msg = document.getElementById('noResults');
            if (!found) {
                if (!msg) {
                    msg = document.createElement('p');
                    msg.id = 'noResults';
                    msg.className = 'text-center text-muted mt-3';
                    msg.textContent = 'No cakes found.';
                    document.getElementById('cakeGrid').appendChild(msg);
                }
            } else if (msg) {
                msg.remove();
            }
        });
    </script>
@endsection
