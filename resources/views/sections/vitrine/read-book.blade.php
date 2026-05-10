<!DOCTYPE html>
<html lang="fr">

@include("sections.vitrine.head")

<body class="index-page">

@include("sections.vitrine.header")

<main class="main">

    <section class="pdf-page">

    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="pdf-header">

            <div>

                <h2>

                    {{ $book->title }}

                </h2>

                <p>

                    Lecture PDF intégrée SSMA

                </p>

            </div>

            {{-- DOWNLOAD --}}
            <a href="{{ route('books.download', $book->id) }}"
               class="btn-download">

                <i class="fa-solid fa-download"></i>

                Télécharger

            </a>

        </div>

        {{-- PDF VIEWER --}}
        <div class="pdf-viewer">

            <embed
            src="{{ route('books.viewPdf', $book->id) }}#toolbar=1"
            type="application/pdf"
            width="100%"
            height="100%">

        </div>

    </div>

</section>

    @include("sections.vitrine.footer")

</main>

</body>
</html>
