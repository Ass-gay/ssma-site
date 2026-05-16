<!DOCTYPE html>
<html lang="en">

@include("sections.vitrine.head")

<body class="index-page">

@include("sections.vitrine.header")

<main class="main">

    <section class="about-hero"
        style="background-image:url('{{ asset('images/bienvenu.jpg') }}')">
    </section>

    <section class="about section">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="{{ asset('images/serigne.jpeg') }}"
                        class="img-fluid rounded-4 shadow-lg"
                        alt="SSMA">
                </div>

                <div class="col-lg-6 mt-4 mt-lg-0">

                    <div class="section-title">
                        <h2>Présentation</h2>
                    </div>

                    <p class="about-text">
                        L'association SSMA est une organisation créée à Dakar le 15 août 2016.
                        Elle œuvre dans le patriotisme, le civisme, la solidarité et le développement communautaire.
                    </p>

                    <div class="about-box">
                        <div><i class="bi bi-check-circle-fill"></i> Patriotisme</div>
                        <div><i class="bi bi-check-circle-fill"></i> Développement</div>
                        <div><i class="bi bi-check-circle-fill"></i> Éducation</div>
                        <div><i class="bi bi-check-circle-fill"></i> Solidarité</div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- TIMELINE -->
    <section class="timeline-section">

        <div class="container">

            <div class="section-title text-center">
                <h2>Notre Histoire</h2>
            </div>

            <div class="timeline">

                <div class="timeline-item" data-aos="fade-up">
                    <span>2016</span>
                    <h4 class="mt-3">Création de SSMA</h4>
                    <p class="mt-2">Fondation de l’association à Dakar.</p>
                </div>

                <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                    <span>2019</span>
                    <h4 class="mt-3">Reconnaissance officielle</h4>
                    <p class="mt-2">Obtention du récépissé légal.</p>
                </div>

                <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                    <span>2026</span>
                    <h4 class="mt-3">Expansion</h4>
                    <p class="mt-2">Plus de 1800 membres au Sénégal et diaspora.</p>
                </div>

            </div>

        </div>

    </section>

    {{-- Galeria --}}
    <section class="gallery-section">

        <div class="container">

            <div class="section-title text-center mb-5">
                <h2>Galerie SSMA</h2>
                <p>Nos activités en images</p>
            </div>

            <div class="swiper mySwiper">

                <div class="swiper-wrapper">

                    @foreach($mediaGalerie as $m)

                        <div class="swiper-slide">

                            @if($m->type == 'image')

                                <img src="{{ asset('storage/'.$m->file) }}">

                            @else

                                <video autoplay muted loop>
                                    <source src="{{ asset('storage/'.$m->file) }}">
                                </video>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </section>

    {{-- Equipe --}}
    <section id="team" class="team-premium">

        {{-- TITLE --}}
        <div class="container">
            <div class="container section-title text-center">
                <h2>
                    Notre Équipe
                </h2>
                <p>
                    Découvrez les membres engagés de la communauté SSMA
                </p>
            </div>

        </div>

        {{-- TEAM --}}
        <div class="container">

            <div class="row g-4">

                @forelse($equipes as $equipe)

                    <div class="col-lg-3 col-md-6">

                        <div class="team-card">

                            {{-- IMAGE --}}
                            <div class="team-image">

                                <img src="{{ asset('storage/'.$equipe->photo) }}"
                                    alt="{{ $equipe->nom }}">

                                {{-- OVERLAY --}}
                                <div class="team-overlay">



                                    </div>

                                </div>

                                {{-- CONTENT --}}
                                <div class="team-content">

                                    <h3>

                                        {{ $equipe->nom }}

                                    </h3>

                                    <span class="role">

                                        {{ $equipe->role ?? 'Membre SSMA' }}

                                    </span>

                                    @if($equipe->bio)

                                        <p>

                                            {{ Str::limit($equipe->bio, 90) }}

                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center">

                            <h4>

                                Aucune équipe disponible

                            </h4>

                        </div>

                    @endforelse

                </div>

            </div>

    </section>

    <!-- Section membre -->
     <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="stats-board">

                <!-- Membres -->
                <article class="stat-tile">
                    <div class="tile-head">
                    <i class="bi bi-people-fill"></i>
                    <div class="label">
                        <h6 class="title">Membres</h6>
                        <small class="hint">Communauté active SSMA</small>
                    </div>
                    </div>
                    <div class="tile-metric">
                    <span class="metric-number purecounter"
                            data-purecounter-start="0"
                            data-purecounter-end="{{ $membresCount }}"
                            data-purecounter-duration="2"></span>
                    <span class="metric-suffix">+</span>
                    </div>
                </article>

                <!-- Médias -->
                <article class="stat-tile">
                    <div class="tile-head">
                        <i class="bi bi-images"></i>

                        <div class="label">
                            <h6 class="title">Médias</h6>
                            <small class="hint">Galerie SSMA</small>
                        </div>
                    </div>

                    <div class="tile-metric">

                        <span class="metric-number purecounter"
                            data-purecounter-start="0"
                            data-purecounter-end="{{ $mediaCount }}"
                            data-purecounter-duration="2"></span>

                        <span class="metric-suffix">+</span>

                    </div>
                </article>

                <!-- Events -->
                <article class="stat-tile">
                    <div class="tile-head">

                        <i class="bi bi-calendar-event"></i>

                        <div class="label">
                            <h6 class="title">Événements</h6>
                            <small class="hint">Activités organisées</small>
                        </div>

                    </div>

                    <div class="tile-metric">

                        <span class="metric-number purecounter"
                            data-purecounter-start="0"
                            data-purecounter-end="{{ $eventsCount }}"
                            data-purecounter-duration="2"></span>

                        <span class="metric-suffix">+</span>

                    </div>
                </article>

                </div>
            </div>
            </div>

        </div>

    </section>

 <!-- CONTACT -->
    <section id="contact" class="contact-ssma">
        <div class="container">

            <!-- TITRE -->
            <div class="section-title text-center mb-5">
            <h2>Contactez-nous</h2>
            <p>Une question ? Une demande ? Nous sommes à votre écoute</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-4">

            <!-- INFOS -->
            <div class="col-lg-5">
                <div class="contact-info">

                <div class="info-box">
                    <i class="bi bi-geo-alt"></i>
                    <div>
                    <h5>Adresse</h5>
                    <p>Dakar, Sénégal</p>
                    </div>
                </div>

                <div class="info-box">
                    <i class="bi bi-telephone"></i>
                    <div>
                    <h5>Téléphone</h5>
                    <p>+221 77 000 00 00</p>
                    </div>
                </div>

                <div class="info-box">
                    <i class="bi bi-envelope"></i>
                    <div>
                    <h5>Email</h5>
                    <p>contact@ssma.sn</p>
                    </div>
                </div>

                </div>
            </div>

            <!-- FORMULAIRE -->
            <div class="col-lg-7">
                <form action="{{ route('contact.public') }}" method="POST" class="contact-form">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                    <input type="text" name="nom" class="form-control" placeholder="Votre nom" required>
                    </div>

                    <div class="col-md-6">
                    <input type="email" name="email" class="form-control" placeholder="Votre email" required>
                    </div>

                    <div class="col-12">
                    <input type="text" name="sujet" class="form-control" placeholder="Sujet" required>
                    </div>

                    <div class="col-12">
                    <textarea name="message" rows="5" class="form-control" placeholder="Votre message" required></textarea>
                    </div>

                    <div class="col-12 text-center">
                    <button type="submit" class="btn-contact">
                        Envoyer le message
                    </button>
                    </div>

                </div>

                </form>
            </div>

            </div>

        </div>
    </section>

</main>



@include("sections.vitrine.footer")
@include("sections.vitrine.scroll")
@include("sections.vitrine.script")

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init({
        duration:1000,
        once:true
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    new Swiper(".mySwiper", {

        loop:true,

        autoplay:{
            delay:2500,
        },

        spaceBetween:20,

        breakpoints:{

            320:{
                slidesPerView:1,
            },

            768:{
                slidesPerView:2,
            },

            1024:{
                slidesPerView:3,
            }

        }

    });
</script>

</body>
</html>



