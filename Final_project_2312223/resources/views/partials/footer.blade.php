
@php
    $isAdmin = request()->is('admin/*');
@endphp

@if($isAdmin)
    {{-- Simple admin footer centered --}}
    <footer class="cakebliss-footer py-5 mt-5" style="background-color: #fff5f8; border-top: 1px solid deeppink;">
        &copy; {{ date('Y') }} <span style="color: deeppink;">Cake Bliss Admin Panel</span>
    </footer>


@else
    {{-- Frontend footer --}}
    <footer class="cakebliss-footer py-5 mt-5" style="background-color: #fff5f8; border-top: 2px solid deeppink;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-start text-dark">

            <!-- Logo & Tagline -->
            <div class="footer-logo text-center text-md-start mb-4 mb-md-0">
                <img src="{{ asset('images/logo.png') }}" alt="Cake Bliss Logo" height="80" class="mb-2">
                <h4 class="fw-bold" style="color: deeppink;">Cake Bliss</h4>
                <p class="small text-muted">Where every bite feels like bliss</p>
            </div>

            <!-- Quick Links -->
            <div class="footer-links text-center text-md-start mb-4 mb-md-0">
                <h5 class="fw-bold mb-3" style="color: deeppink;">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="footer-link">About Us</a></li>
                    <li><a href="{{ url('/cakes') }}" class="footer-link">Cakes</a></li>
                    <li><a href="{{ url('/contact') }}" class="footer-link">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-info text-center text-md-start">
                <h5 class="fw-bold mb-3" style="color: deeppink;">Contact Us</h5>
                <p><i class="bi bi-geo-alt-fill text-pink me-2"></i> Karachi, Pakistan</p>
                <p><i class="bi bi-telephone-fill text-pink me-2"></i> (021) 1234 - 5678</p>
                <p><i class="bi bi-envelope-fill text-pink me-2"></i> cakebliss@gmail.com</p>

                <!-- Social Icons -->
                <div class="footer-social mt-3">
                    <a href="mailto:cakebliss@gmail.com" class="btn-social" target="_blank"><i class="bi bi-envelope"></i></a>
                    <a href="https://twitter.com/cakebliss" class="btn-social" target="_blank"><i class="bi bi-twitter"></i></a>
                    <a href="https://facebook.com/cakebliss" class="btn-social" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://instagram.com/cakebliss" class="btn-social" target="_blank"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

        </div>

        <hr class="my-4" style="border-color: deeppink; opacity: 0.5;">

        <div class="text-center small text-muted">
            © {{ date('Y') }} <span style="color: deeppink;">Cake Bliss</span>. All rights reserved.
        </div>
    </footer>
@endif
