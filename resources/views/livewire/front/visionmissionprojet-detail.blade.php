<div>
    <section id="service-details" class="service-details section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-detail-item mb-5">
                        @if($data->image)
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/img/'.$imageFolder.'/'.$data->image) }}" 
                                 alt="{{ $data->title }}" 
                                 class="img-fluid rounded" 
                                 style="max-height: 400px; width: auto; object-fit: cover;">
                        </div>
                        @else
                        <div class="text-center text-muted mb-4">{{ __('app.no_image') }}</div>
                        @endif
                        
                        <h3 class="text-center mb-3">{{ $data->title }}</h3>
                        <div class="content" style="text-align: justify; line-height: 1.6;">
                            {!! nl2br(e($data->description)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>