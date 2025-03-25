<div>
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Apropos de nous</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                @foreach ($abouts as $about)
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p class="who-we-are">Nous sommes</p>
                    <h3>Fab Technology</h3>
                    <p class="fst-italic"  style="text-align: justify;">
                        {{ $about->description }}
                    </p>
                   
                    {{-- <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in
                                voluptate velit.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                    </ul> --}}
                    {{-- <a href="#" class="read-more"><span>Lireplus</span><i class="bi bi-arrow-right"></i></a> --}}
                </div>

                <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-6">
                        <div class="col-lg-10">
                            <img src="{{ asset('assets/img/about/'.$about->image) }}" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </section>
</div>
