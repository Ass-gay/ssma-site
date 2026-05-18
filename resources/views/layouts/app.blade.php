<!DOCTYPE html>
<html lang="fr">

    {{-- CSS template --}}
    @include("sections.vitrine.head")

<body class="index-page">
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

        if(input){

            const iti = window.intlTelInput(input, {
                initialCountry: "sn",
                preferredCountries: ["sn", "fr", "ci", "ma"],
                separateDialCode: true,
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
            });

            document.querySelector("form").addEventListener("submit", function () {
                input.value = iti.getNumber();
            });

        }
    </script>
</body>
</html>
