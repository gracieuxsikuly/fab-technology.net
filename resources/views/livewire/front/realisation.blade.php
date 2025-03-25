<div>
    <section id="stats" class="stats section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="container section-title" data-aos="fade-up">
                <h2>Nos réalisations</h2>
            </div>
            <div class="row gy-4">
                @foreach ($reals as $real)
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{$real->nombre}}" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>{{$real->designation}}</p>
                    </div>
                </div><!-- End Stats Item -->
{{-- 
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Projects</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Workers</p>
                    </div>
                </div><!-- End Stats Item --> --}}
                @endforeach
            </div>

        </div>

    </section>
</div>
