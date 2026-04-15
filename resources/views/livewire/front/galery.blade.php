<div>
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('app.our_photos') }}</h2>
            <p>{{ __('app.gallery_subtitle') }}</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">{{ __('app.filter_all') }}</li>
                    <li data-filter=".terrain">{{ __('app.filter_terrain') }}</li>
                    <li data-filter=".attelier">{{ __('app.filter_atelier') }}</li>
                    <li data-filter=".service">{{ __('app.filter_service') }}</li>
                    <li data-filter=".installation">{{ __('app.filter_installation') }}</li>
                    <li data-filter=".programmation">{{ __('app.filter_programmation') }}</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @forelse ($galers as $gal)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{$gal->categori}}">
                        <img src="{{ asset('assets/img/galery/'.$gal->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$gal->title}}</h4>
                            <a href="{{ asset('assets/img/galery/'.$gal->image) }}" title="{{$gal->title}}"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="#" title="{{ __('app.details') }}" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->
                    @empty
                    <div class="col-12 text-center text-muted">{{ __('app.no_data') }}</div>
                    @endforelse
            


                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section>
</div>
