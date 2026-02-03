<div class="main-footer-section-ed">
    <div class="container">
        <div class="footer-modern">
            <div class="footer-brand" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('assets/Logo.svg') }}" class="img-fluid footer-logo" alt="Logo">
                <p class="footer-desc">Fresh, sustainable, and farm‑to‑home products that support healthy living and local farmers.</p>
                <div class="footer-social">
                    <a href="#" class="footer-social-link" aria-label="Instagram">
                        <img src="{{ asset('assets/Insta.png') }}" class="img-fluid" alt="Instagram">
                    </a>
                    <a href="#" class="footer-social-link" aria-label="Facebook">
                        <img src="{{ asset('assets/Fb.png') }}" class="img-fluid" alt="Facebook">
                    </a>
                    <a href="#" class="footer-social-link" aria-label="Twitter">
                        <img src="{{ asset('assets/Twiter.png') }}" class="img-fluid" alt="Twitter">
                    </a>
                    <a href="#" class="footer-social-link" aria-label="Pinterest">
                        <img src="{{ asset('assets/Pintrest.png') }}" class="img-fluid" alt="Pinterest">
                    </a>
                </div>
            </div>

            <div class="footer-links" data-aos="fade-up" data-aos-duration="1000">
                <h4>Quick Links</h4>
                <ul class="footer-links-list">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="footer-contact" data-aos="fade-up" data-aos-duration="1000">
                <h4>Contact Us</h4>
                <ul class="footer-contact-list">
                    <li>
                        <span class="footer-label">Email</span>
                        <span class="footer-value">needhelp@Organia.com</span>
                    </li>
                    <li>
                        <span class="footer-label">Phone</span>
                        <span class="footer-value">666 888 888</span>
                    </li>
                    <li>
                        <span class="footer-label">Address</span>
                        <span class="footer-value">Rajkot, Gujarat, India</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="footer-copy-right">
    Copyright © <span class="blt-ftr">{{ date('Y') }} Agri-Sites</span> | Organic Agricultural Products & Services
</div>
