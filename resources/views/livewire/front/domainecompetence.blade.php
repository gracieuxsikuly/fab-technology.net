<div>
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('app.competencedomaine') }}</h2>
            <p>{{ __('app.competence_subtitle') }}</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="skills-content">
                @foreach($domainecompetences as $domaine)
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: {{ $domaine->value }}%; background-color: {{ $domaine->couleur }}" aria-valuenow="{{ $domaine->value }}" aria-valuemin="0" aria-valuemax="100">
                    <span class="skill">{{ $domaine->title }} <i class="val">{{ $domaine->value }}%</i></span>
                  </div>
                </div>
                @endforeach
              </div>

        </div>

    </section>
</div>
