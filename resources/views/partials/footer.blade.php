<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="#hero" class="logo d-flex align-items-center">
                    <span class="sitename">Fab-Technology</span>
                </a>
                <div class="footer-contact pt-3">
                    <p style="text-align: justify;">Fab-Technology est une entreprise qui a vu le jour en 2018, est un fournisseur indépendant et 
                        complet de services et de produits informatiques. Il s’agit d’une entreprise de services 
                        informatiques et de maintenance devenue l’une des meilleures en RDC et plus particulièrement
                         au Nord-Kivu dans la ville de Goma. </p>
                   
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-3 footer-links">
                <h4>Liens utiles</h4>
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Accueil</a></li>
                    <li><a href="#about">A propos de nous</a></li>
                    <li><a href="#services">Nos Services</a></li>
                    <li><a href="#portfolio">Galeries</a></li>
                    <li><a href="#team">Notre Equipe</a></li>
                    <li><a href="#contact">Contact</a></li>
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
                <h4>Nos contacts</h4>
                <p>
                    RDC/Nord-Kivu/Ville de Goma
                </p>
                <p class="mt-3">
                    <strong>Num Tél:</strong> <a href="tel:+243847451389"><span>+243847451389</span></a></p>
                <p>
                    <strong>Email:</strong> <a href="mailto:info@fab-technology.net"><span>info@fab-technology.net</span></a> 
                  </p>
                  <p>
                    RDC/Haut Katanga/Haut Katanga ville de Lubumbashi
                </p>
                <p class="mt-3">
                    <strong>Num Tél:</strong> <a href="tel:+243995502421"><span>+243995502421</span></a></p>
                <p>
                    <strong>Email:</strong> <a href="mailto:info@fab-technology.net"><span>info@fab-technology.net</span></a> 
                  </p>         
                {{-- <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p> --}}
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">
            @php
                $year = date('Y');
                echo $year;
            @endphp
            </strong> <span>Tous droits réservés</span>
        </p>
        <div class="credits">
            Developed by <a href="#">Fab-Technology</a>
        </div>
    </div>

</footer>
