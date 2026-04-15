<div>
    <section id="faq" class="faq section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('app.faq_title') }}</h2>
            <p>{{ __('app.faq_subtitle') }}</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-container">
                        @foreach($faqs as $index => $faq)
                            @if($index < 3) <!-- Premiers 3 FAQs -->
                                <div class="faq-item">
                                    <h3>{{ $faq->question }}</h3>
                                    <div class="faq-content">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                </div><!-- End Faq item-->
                            @endif
                        @endforeach
                    </div>
                </div><!-- End Faq Column-->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">

                        @foreach($faqs as $index => $faq)
                        @if($index >= 3) <!-- FAQs suivants (index 3 à 5) -->
                            <div class="faq-item">
                                <h3>{{ $faq->question }}</h3>
                                <div class="faq-content">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->
                        @endif
                    @endforeach
                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section>
</div>
