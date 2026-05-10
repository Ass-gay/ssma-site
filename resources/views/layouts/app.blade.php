<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSS template --}}
    @include("sections.vitrine.head")

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- CSS perso (TOUJOURS après le template) --}}
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
</head>

<body>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    {{-- Header --}}
    @include("sections.vitrine.header")

    <main class="main-content">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include("sections.vitrine.footer")

    {{-- Scripts --}}
    @include("sections.vitrine.scroll")
    @include("sections.vitrine.script")
    {{-- Librairie --}}
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

    {{-- JS page --}}
    @stack('scripts')

    <script>
        const input = document.querySelector("#phoneInput");

        const iti = window.intlTelInput(input, {
            initialCountry: "sn", // Sénégal 🇸🇳
            preferredCountries: ["sn", "fr", "ci", "ma"],
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
        });

        // Avant envoi du formulaire
        document.querySelector("form").addEventListener("submit", function () {
            input.value = iti.getNumber(); // +221xxxxxxxx
        });
    </script>
</body>
</html>
