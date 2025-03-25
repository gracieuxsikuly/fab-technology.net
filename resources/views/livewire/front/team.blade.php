<div>
    <section id="team" class="team section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Notre Equipe</h2>
            <p>Une équipe d'experts passionnés, alliant innovation et rigueur pour transformer vos défis informatiques en solutions pérennes.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
@foreach ($equipes as $eq)
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
    <div class="member">
        <img src="{{ asset('assets/img/equipe/'.$eq->image) }}" class="img-fluid" alt="">
        <div class="member-info">
            <div class="member-info-content">
                <h4>{{$eq->designation}}</h4>
                <span>{{$eq->fonction.'/'.$eq->phone}}</span>
                <div class="social">
                    <a href="{{$eq->email}}" target="_blank"><i class="bi bi-google"></i></a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Team Member -->
@endforeach
              
            </div>

        </div>

    </section>
</div>
