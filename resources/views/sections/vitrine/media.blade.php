<!DOCTYPE html>
<html lang="en">

@include("sections.vitrine.head")

<body class="index-page">

@include("sections.vitrine.header")

<main class="main">

    <!-- MEDIA SECTION -->
    <section class="media section">

        <div class="container section-title text-center">
            <h2 class="mt-1">Médias</h2>
            <p class="mb-1">Découvrez nos activités en images et vidéos</p>
        </div>

        <div class="container">

            <div class="row g-4">

                @forelse($events as $event)

                    @php
                        // relation sécurisée (évite erreur si null)
                        $cover = $event->media->first();
                    @endphp

                    @if($cover)

                        <div class="col-lg-4 col-md-6">

                            <div class="media-card">

                                {{-- COVER --}}
                                @if($cover->type === 'image')
                                    <img src="{{ asset('storage/'.$cover->file) }}"
                                         class="img-fluid"
                                         onclick="openLightbox(this.src)">
                                @else
                                    <video class="w-100"
                                           muted
                                           autoplay
                                           loop
                                           onclick="openLightbox(this.querySelector('source').src)">
                                        <source src="{{ asset('storage/'.$cover->file) }}">
                                    </video>
                                @endif

                                {{-- INFO --}}
                                <div class="media-info mt-2 text-center">

                                    {{-- titre sécurisé --}}
                                    <h5>{{ $event->titre ?? $event->title ?? 'Événement' }}</h5>

                                    {{-- count sécurisé --}}
                                    <span class="badge bg-dark">
                                        {{ $event->media->count() ?? 0 }} médias
                                    </span>

                                    <br>

                                    <a href="{{ route('events.show', $event->id) }}"
                                       class="btn btn-sm btn-light mt-2">
                                        Voir album
                                    </a>

                                </div>

                            </div>

                        </div>

                    @endif

                @empty

                    <div class="text-center w-100">
                        <p>Aucun album disponible</p>
                    </div>

                @endforelse

            </div>

        </div>

    </section>

   {{-- Contact --}}
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

<!-- LIGHTBOX -->
<div id="lightboxModal" class="lightbox" onclick="closeLightbox()">
    <span class="lightbox-close">&times;</span>
    <img id="lightboxImg" class="lightbox-img">
</div>



<script>
    function openLightbox(src) {
        document.getElementById('lightboxModal').style.display = 'flex';
        document.getElementById('lightboxImg').src = src;
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightboxModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") closeLightbox();
    });
</script>

</body>
</html>
