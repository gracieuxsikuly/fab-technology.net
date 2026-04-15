<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="#hero" class="logo d-flex align-items-center">
                    <span class="sitename">Fab-Technology</span>
                </a>
                <div class="footer-contact pt-3">
                    <p style="text-align: justify;">{{ __('app.footer_description') }}</p>
                   
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-3 footer-links">
                <h4>{{ __('app.useful_links') }}</h4>
                <ul>
                    <li><a href="{{ route('home') }}" class="active">{{ __('app.home') }}</a></li>
                    <li><a href="#about">{{ __('app.about_us') }}</a></li>
                    <li><a href="#services">{{ __('app.our_services') }}</a></li>
                    <li><a href="#portfolio">{{ __('app.our_gallery') }}</a></li>
                    <li><a href="#team">{{ __('app.our_team') }}</a></li>
                    <li><a href="#contact">{{ __('app.contact') }}</a></li>
                </ul>
            </div>

            {{-- <div class="col-lg-2 col-md-3 footer-links">
                <h4>Nos services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div> --}}

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>{{ __('app.our_contacts') }}</h4>
                <p>
                    RDC/Nord-Kivu/Ville de Goma
                </p>
                <p class="mt-3">
                    <strong>{{ __('app.phone_number') }}</strong> <a href="tel:+243847451389"><span>+243847451389</span></a></p>
                <p>
                    <strong>{{ __('app.email') }}:</strong> <a href="mailto:info@fab-technology.net"><span>info@fab-technology.net</span></a> 
                  </p>
                  <p>
                    RDC/Haut Katanga/Haut Katanga ville de Lubumbashi
                </p>
                <p class="mt-3">
                    <strong>{{ __('app.phone_number') }}</strong> <a href="tel:+243995502421"><span>+243995502421</span></a></p>
                <p>
                    <strong>{{ __('app.email') }}:</strong> <a href="mailto:info@fab-technology.net"><span>info@fab-technology.net</span></a> 
                  </p>         
                {{-- <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p> --}}
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ date('Y') }}</strong> <span>{{ __('app.all_rights_reserved') }}</span>
        </p>
        <div class="credits">
            Developed by <a href="#">Fab-Technology</a>
        </div>
    </div>

</footer>
