 <section id="hero" class="hero section dark-background">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center gy-5">

        <!-- TEXTE -->
        <div class="col-lg-8">
            <div class="hero-card shadow-sm" data-aos="fade-right" data-aos-delay="150">

            <div class="content">

                <h2 class="display-5 fw-bold mb-3">
                Bienvenue sur l'association sunu papa sunu serigne babacar sy abdou
                </h2>

                <p class="lead mb-4">
                SOLDAROU SERIGNE MBAYE SY ABDOU (SSMA) est une association à but non lucratif créée à Dakar le 15 août 2016 conformément à la disposition du code des obligations civiles et commerciales.
                </p>

                <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('apropos') }}" class="btn btn-primary-ghost">
                    Découvrir l’association
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

                @if(!Route::is('members.rules') && !Route::is('members.form'))
                    <a href="{{ route('members.rules') }}" class="btn btn-primary-ghost btn-ong">
                        <i class="fa-solid fa-user-plus"></i> Devenir membre
                    </a>
                @endif
                </div>

            </div>

            </div>
        </div>

        <!-- IMAGE -->
        <div class="col-lg-4 text-center">

            <figure class="media primary shadow-sm">
            <img style="width:299px" src="images/logo-ssma.png" class="hero-glow img-fluid" alt="SSMA Logo">
            </figure>

        </div>

        </div>

    </div>

</section>
