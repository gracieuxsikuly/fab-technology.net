<div>
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>RDC/Nord-Kivu/Ville de Goma, RDC/Haut Katanga/Haut Katanga ville de Lubumbashi</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-4">
                    <div
                        class="info-item d-flex flex-column justify-content-center align-items-center info-item-borders">
                        <i class="bi bi-telephone"></i>
                        <h3>Appelez nous</h3>
                        <p> +243847451389|+243995502421</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-4">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-envelope"></i>
                        <h3>Envoiyez un mail</h3>
                        <p>info@fab-technology.net</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <form class="php-email-form" data-aos="fade-up"
                data-aos-delay="300" wire:submit.prevent='savemessage'>
                @csrf
                <div class="row gy-4">
                    <div class="col-md-6">
                        <input type="text" wire:model="nom" class="form-control" placeholder="Entrer votre nom" required="">
                    </div>

                    <div class="col-md-6 ">
                        <input type="email" class="form-control" wire:model="email" placeholder="Votre adresse mail" required="">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control" wire:model="object" placeholder="Objet du message" required="">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" wire:model="message" rows="6" placeholder="Message"
                            required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        {{-- @if ($saved)
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                        @endif --}}
                        <button type="submit">Envoyez le Message</button>
                    </div>

                </div>
            </form><!-- End Contact Form -->

        </div>

    </section>
</div>
