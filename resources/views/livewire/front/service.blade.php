<div>
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('app.our_services') }}</h2>
            <p>{{ __('app.services_subtitle') }}</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                @forelse ($servs as $serv)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="bi bi-card-checklist icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title"><a href="{{ route('servicedetails', ['slug'=>$serv->slug]) }}" 
                                class="stretched-link">{{$serv->title}}</a>
                            </h4>
                            <p class="description">{{ Str::limit($serv->description, 200) }}</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

               @empty
               <div class="col-12 text-center text-muted">{{ __('app.no_data') }}</div>
               @endforelse

            </div>

        </div>

    </section>
</div>
