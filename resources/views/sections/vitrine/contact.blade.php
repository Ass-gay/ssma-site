<!DOCTYPE html>
<html lang="en">

@include("sections.vitrine.head")

<body class="index-page">

@include("sections.vitrine.header")

<main class="main">

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

</body>
</html>
