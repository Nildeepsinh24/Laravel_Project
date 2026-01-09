<div class="container main-footer-section-ed">
    <div class="row footer-main-row-mn">

        <div class="col-md-3 footer-one-clm">
            <ul class="ftr-mn-ul">
                <h4>Contact Us</h4>

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
                <img src="{{ asset('assets/images/common/Logo.svg') }}" class="img-fluid">

                <p class="f-c-m-pera-fcm">
                    Simply dummy text of the printing and typesetting industry.
                </p>

                <div class="social-main-cnct">
                    <a href="#"><img src="{{ asset('assets/images/common/Insta.png') }}"></a>
                    <a href="#"><img src="{{ asset('assets/images/common/Fb.png') }}"></a>
                    <a href="#"><img src="{{ asset('assets/images/common/Pintrest.png') }}"></a>
                </div>
            </div>
        </div>

        <div class="col-md-3 footer-three-clm">
            <ul class="ftr-mn-ul">
                <h4>Utility Pages</h4>

                <li><a href="{{ route('error.page') }}">404 Not Found</a></li>
                <li><a href="{{ route('password.protect') }}">Password Protected</a></li>
                <li><a href="{{ route('licenses') }}">Licences</a></li>
                <li><a href="{{ route('changelog') }}">Changelog</a></li>
            </ul>
        </div>

    </div>
</div>

<div class="footer-copy-right">
    Copyright ©
    <span class="blt-ftr">Organick</span> |
    Designed by <span class="blt-ftr">VictorFlow</span>
</div>
