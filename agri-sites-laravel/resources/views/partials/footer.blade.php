<div class="container main-footer-section-ed">
    <div class="row footer-main-row-mn">
        <div class="col-md-3 footer-one-clm">
            <ul class="ftr-mn-ul">
                <h4 data-aos="fade-up" data-aos-duration="1000">Contact Us</h4>
                <li class="ftr-mn-li">
                    <p class="ftr-mcnt">Email</p>
                    <p class="ftr-msct">needhelp@Organia.com</p>
                </li>
                <li class="ftr-mn-li">
                    <p class="ftr-mcnt">Phone</p>
                    <p class="ftr-msct">666 888 888</p>
                </li>
                <li class="ftr-mn-li">
                    <p class="ftr-mcnt">Address</p>
                    <p class="ftr-msct">88 road, borklyn street, USA</p>
                </li>
            </ul>
        </div>

        <div class="col-md-6 footer-two-clm">
            <div class="footer-center-main">
                <img src="{{ asset('assets/Logo.svg') }}" class="img-fluid" data-aos="fade-up" data-aos-duration="1000" alt="Logo">
                <p class="f-c-m-pera-fcm">Simply dummy text of the printing and typesetting industry. Lorem Ipsum simply dummy text of the printing</p>
                <div class="social-main-cnct">
                    <div class="main-icn-social">
                        <a href="#">
                            <img src="{{ asset('assets/Insta.png') }}" class="img-fluid" alt="Instagram">
                        </a>
                    </div>
                    <div class="main-icn-social">
                        <a href="#">
                            <img src="{{ asset('assets/Fb.png') }}" class="img-fluid" alt="Facebook">
                        </a>
                    </div>
                    <div class="main-icn-social">
                        <a href="#">
                            <img src="{{ asset('assets/Twiter.png') }}" class="img-fluid" alt="Twitter">
                        </a>
                    </div>
                    <div class="main-icn-social">
                        <a href="#">
                            <img src="{{ asset('assets/Pintrest.png') }}" class="img-fluid" alt="Pinterest">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 footer-three-clm">
            <ul class="ftr-mn-ul">
                <h4 data-aos="fade-up" data-aos-duration="1000">Utility Pages</h4>
                <li class="ftr-mn-li-right-side">
                    <p class="ftr-msct-right-side"><a href="{{ route('style-guide') }}">Style Guide</a></p>
                </li>
                <li class="ftr-mn-li-right-side">
                    <p class="ftr-msct-right-side"><a href="{{ route('error') }}">404 Not Found</a></p>
                </li>
                <li class="ftr-mn-li-right-side">
                    <p class="ftr-msct-right-side"><a href="{{ route('password') }}">Password Protected</a></p>
                </li>
                <li class="ftr-mn-li-right-side">
                    <p class="ftr-msct-right-side"><a href="{{ route('licenses') }}">Licences</a></p>
                </li>
                <li class="ftr-mn-li-right-side">
                    <p class="ftr-msct-right-side"><a href="{{ route('changelog') }}">Changelog</a></p>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="footer-copy-right">
    Copyright © <span class="blt-ftr">{{ date('Y') }} Agri-Sites</span> | Organic Agricultural Products & Services
</div>
