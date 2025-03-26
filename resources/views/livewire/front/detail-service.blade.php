<div>
    <section id="service-details" class="service-details section">
        <div class="container">
            <div class="row justify-content-center"> <!-- Centrage de la row -->
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200"> <!-- 8 colonnes avec offset automatique -->
                    @foreach ($serdets as $detserv)
                    <div class="service-detail-item mb-5"> <!-- Ajout d'une marge basse -->
                        @if($detserv->image)
                        <div class="text-center mb-4"> <!-- Centrage de l'image -->
                            <img src="{{ asset('assets/img/service/'.$detserv->image) }}" 
                                 alt="{{ $detserv->title }}" 
                                 class="img-fluid rounded" 
                                 style="max-height: 400px; width: auto; object-fit: cover;"> <!-- Hauteur fixe et conservation des proportions -->
                        </div>
                        @else
                        <div class="text-center text-danger mb-4">No Image</div>
                        @endif
                        
                        <h3 class="text-center mb-3">{{ $detserv->title }}</h3>
                        <div class="content" style="text-align: justify; line-height: 1.6;">
                            {!! nl2br(e($detserv->description)) !!} <!-- Meilleure gestion des sauts de ligne -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>