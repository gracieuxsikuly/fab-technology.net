<div>
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Nos Photos</h2>
            <p>Parcourez notre galerie et visualisez l'excellence de nos projets à travers des images qui parlent d'elles-mêmes.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">Tous</li>
                    <li data-filter=".terrain">Terrain</li>
                    <li data-filter=".attelier">Attelier</li>
                    <li data-filter=".service">Service</li>
                    <li data-filter=".installation">Installation</li>
                    <li data-filter=".programmation">Programmation</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($galers as $gal)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{$gal->categori}}">
                        <img src="{{ asset('assets/img/galery/'.$gal->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$gal->title}}</h4>
                            {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                            <a href="{{ asset('assets/img/galery/'.$gal->image) }}" title="{{$gal->title}}"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="#" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item --> 
                    @endforeach
            


                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section>
</div>
