
@extends('layout')

@section('title', 'Our Cakes - Cake Bliss')

@section('content')
    <div class="container my-5">
        <h2 class="mb-4 text-center text-pink">Our Cakes</h2>

        <!-- Categories -->
        @php $currentCategory = $category ?? 'all'; @endphp
        <ul class="nav nav-pills justify-content-center mb-4 gap-3">
            <li class="nav-item">
                <a class="nav-link {{ $currentCategory === 'all' ? 'active' : '' }}" href="{{ route('frontend.cakes.index', 'all') }}">All Cakes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentCategory === 'regular' ? 'active' : '' }}" href="{{ route('frontend.cakes.index', 'regular') }}">Regular</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentCategory === 'customized' ? 'active' : '' }}" href="{{ route('frontend.cakes.index', 'customized') }}">Customized</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $currentCategory === 'wedding' ? 'active' : '' }}" href="{{ route('frontend.cakes.index', 'wedding') }}">Wedding</a>
            </li>
        </ul>

        <!-- Cake Grid -->
        <div class="row g-4">
            @if($cakes->isEmpty())
                <p class="text-center text-muted mt-3">No cakes found.</p>
            @else
                @foreach($cakes as $cake)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="{{ route('frontend.cakes.show', $cake->id) }}" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <img src="{{ asset('uploads/' . $cake->image) }}" class="card-img-top" alt="{{ $cake->name }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-pink fw-semibold">{{ $cake->name }}</h5>
                                    <p class="text-muted small mb-1">{{ $cake->description }}</p>
                                    <p class="fw-bold mb-3">PKR {{ $cake->price }}</p>

                                    <span class="btn btn-outline-pink btn-sm">View Details</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            @endif
        </div>
    </div>
@endsection
