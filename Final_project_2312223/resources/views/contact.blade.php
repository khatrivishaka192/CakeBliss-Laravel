@extends('layout')

@section('title', 'Contact - Cake Bliss')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-5 text-pink fw-bold">Get in Touch with Cake Bliss</h2>

        <div class="row g-5 align-items-start">
            <!-- Left Side: Contact Info + Map -->
            <div class="col-md-5">
                <div class="p-4 bg-white rounded-4 shadow-sm border-0 h-100">
                    <h4 class="text-pink fw-bold mb-3">📞 Contact Information</h4>
                    <p class="mb-2"><i class="bi bi-geo-alt-fill text-pink me-2"></i>Street 123, Karachi City</p>
                    <p class="mb-2"><i class="bi bi-telephone-fill text-pink me-2"></i>+92 300 1234567</p>
                    <p class="mb-2"><i class="bi bi-envelope-fill text-pink me-2"></i>info@cakebliss.com</p>
                    <p><i class="bi bi-clock-fill text-pink me-2"></i>Mon–Sat | 9:00 AM – 12:00 AM</p>

                    <hr class="my-4" style="opacity: 0.4; border-top: 1px solid #ff5fa2;">

                    <h5 class="text-pink fw-semibold mb-3">📍 Find Us on Map</h5>
                    <div class="ratio ratio-4x3 rounded-4 shadow-sm">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.640281545933!2d67.0011!3d24.8607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33d8e8e7a0a6b%3A0xe8f1a5c8c3160df!2sClifton%2C%20Karachi!5e0!3m2!1sen!2s!4v1730228888888"
                            width="100%"
                            height="280"
                            style="border:0; border-radius:15px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>
                </div>
            </div>

            <!-- Right Side: Contact Form -->
            <div class="col-md-7">
                <div class="p-4 bg-white rounded-4 shadow-sm border-0">
                    @if(session('success'))
                        <div class="alert alert-success text-center rounded-3 shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif


                        <form action="{{ route('contact.submit') }}" method="POST">
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
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-5">
            <a href="{{ url('/') }}" class="btn btn-outline-pink">← Back to Home</a>
        </div>
    </div>
@endsection
