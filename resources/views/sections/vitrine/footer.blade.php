<footer class="footer-ssma">

        <div class="container">
            <div class="row gy-5">

            <!-- LOGO + DESCRIPTION -->
            <div class="col-lg-3">
                <div class="footer-brand text-center text-lg-start">
                    <!-- LOGO -->
                    <a href="{{ route('home') }}">
                        <img style="width:60px;" src="{{ asset('images/logo-ssma.png') }}" alt="Logo">
                    </a>
                <h5 class="mb-4">SSMA</h5>
                <p class="text-white">Association Sunu Papa Sunu Serigne Babacar Sy Abdou</p>

                <div class="social-links mt-3">
                    <a href="https://www.tiktok.com/@ssmasenegal?_r=1&_t=ZN-96TWoTMyrzS">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://www.facebook.com/share/18TtjftAHt/?mibextid=wwXIfr">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://youtube.com/@ssmasenegal2016?si=wXOIcTHwJ1wqD5so">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="https://www.instagram.com/ssma_serigne_babacar_sy_abdou_?igsh=MXJ0bDRvNjNmaGcyMg==">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
                </div>
            </div>

            <!-- SECTIONS REGIONALES -->
            <div class="col-lg-3">

                <h6 class="footer-title">
                    Sections Régionales
                </h6>

                <ul class="footer-list">

                    @foreach($regionales as $region)

                        <li>{{ $region->nom }}</li>

                    @endforeach

                </ul>

            </div>

            <!-- SECTIONS DEPARTEMENTALES -->
            <div class="col-lg-3">

                <h6 class="footer-title">
                    Sections Départementales
                </h6>

                <ul class="footer-list">

                    @foreach($departementales as $dep)

                        <li>{{ $dep->nom }}</li>

                    @endforeach

                </ul>

            </div>

            <!-- DIASPORA -->
            <div class="col-lg-3">

                <h6 class="footer-title">
                    Sections Diaspora
                </h6>

                <ul class="footer-list">

                    @foreach($diasporas as $diaspora)

                        <li>{{ $diaspora->nom }}</li>

                    @endforeach

                </ul>

            </div>

            </div>
        </div>

        <div class="footer-bottom text-center mt-4">
            <p>
                © {{ date('Y') }} SSMA - Tous droits réservés
            </p>
        </div>

</footer>
