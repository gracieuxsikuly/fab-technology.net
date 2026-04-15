<div>
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('app.contact') }}</h2>
            <p>{{ __('app.contact_subtitle') }}</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-geo-alt"></i>
                        <h3>{{ __('app.address') }}</h3>
                        <p>RDC/Nord-Kivu/Ville de Goma</p>
                        <p> RDC/Haut Katanga/Haut Katanga ville de Lubumbashi</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-4">
                    <div
                        class="info-item d-flex flex-column justify-content-center align-items-center info-item-borders">
                        <i class="bi bi-telephone"></i>
                        <h3>{{ __('app.call_us') }}</h3>
                        <p> +243847451389</p>
                        <p>+243995502421</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-4">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-envelope"></i>
                        <h3>{{ __('app.send_email') }}</h3>
                        <p>info@fab-technology.net</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <form class="php-email-form" data-aos="fade-up"
                data-aos-delay="300" wire:submit.prevent='savemessage'>
                @csrf
                <div class="row gy-4">
                    <div class="col-md-6">
                        <input type="text" wire:model="nom" class="form-control" placeholder="{{ __('app.enter_your_name') }}" required="">
                    </div>

                    <div class="col-md-6 ">
                        <input type="email" class="form-control" wire:model="email" placeholder="{{ __('app.your_email_address') }}" required="">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control" wire:model="objet" placeholder="{{ __('app.message_subject') }}" required="">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" wire:model="message" rows="6" placeholder="{{ __('app.your_message') }}"
                            required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit">{{ __('app.send_the_message') }}</button>
                    </div>

                </div>
            </form><!-- End Contact Form -->

        </div>

    </section>
</div>
