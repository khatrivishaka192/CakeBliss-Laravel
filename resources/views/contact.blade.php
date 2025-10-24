@extends('layout')

@section('title', 'Contact - Cake Bliss')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4 text-pink fw-bold">Get in Touch</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session('success'))
                    <div class="alert alert-success text-center rounded-3 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ url('/contact') }}" method="POST" class="p-4 bg-white rounded-4 shadow-sm border-0">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold text-pink">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control rounded-3" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-pink">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control rounded-3" placeholder="you@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label fw-semibold text-pink">Your Message</label>
                        <textarea name="message" id="message" rows="4" class="form-control rounded-3" placeholder="Write your message here..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-pink w-100 mt-3">Send Message</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-5">
            <h5 class="fw-bold text-pink mb-2">Visit Our Shop</h5>
            <p class="text-muted mb-1">📍 Street 123, New York City</p>
            <p class="text-muted">🕒 Open Mon–Sat | 9:00 AM – 12:00 AM</p>

            <a href="{{ url('/') }}" class="btn btn-outline-pink mt-3">← Back to Home</a>
        </div>
    </div>
@endsection
