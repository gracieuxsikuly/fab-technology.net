<div>
    <section id="team" class="team section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('app.our_team') }}</h2>
            <p>{{ __('app.team_subtitle') }}</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
@forelse ($equipes as $eq)
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="member">
        <img src="{{ asset('assets/img/equipe/'.$eq->image) }}" class="img-fluid" alt="">
        <div class="member-info">
            <div class="member-info-content">
                <h4>{{$eq->designation}}</h4>
                <span>{{$eq->fonction.'/'.$eq->phone}}</span>
                <div class="social">
                    <a href="mailto:{{$eq->email}}" target="_blank"><i class="bi bi-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Team Member -->
@empty
<div class="col-12 text-center text-muted">{{ __('app.no_data') }}</div>
@endforelse
              
            </div>

        </div>

    </section>
</div>
