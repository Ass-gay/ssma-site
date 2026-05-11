<header id="header" class="header sticky-top">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="logo-box">

            <img src="{{ asset('images/logo-ssma.png') }}"
                 alt="Logo">

        </a>

        {{-- MOBILE BUTTON --}}
        <button type="button"
        class="mobile-nav-toggle"
        id="menuBtn">
            <i id="menuIcon" class="fa-solid fa-bars"></i>
        </button>

        {{-- MENU --}}
        <div class="nav-wrapper"
             id="mobileMenu">

            <nav id="navmenu" class="navmenu">

                <ul>

                    <li>
                        <a href="{{ route('home') }}">
                            ACCUEIL
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('apropos') }}">
                            À PROPOS
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('events.vitrine') }}">
                            ÉVÉNEMENTS
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('media.vitrine') }}">
                            MEDIA
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('equipe.vitrine') }}">
                            ÉQUIPE
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('books.auteurs') }}">
                            BIBLIOTHÈQUE
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">
                            CONTACT
                        </a>
                    </li>

                    @guest

                        <li>
                            <a href="{{ route('login') }}">
                                CONNEXION
                            </a>
                        </li>

                    @endguest

                    @auth

                        <li>

                            <form method="POST"
                                  action="{{ route('logout') }}">

                                @csrf

                                <button type="submit"
                                        class="btn-deconect">

                                    DECONNEXION

                                </button>

                            </form>

                        </li>

                    @endauth

                </ul>

            </nav>

            {{-- BUTTON --}}
            @if(!Route::is('members.rules') && !Route::is('members.form'))

                <a href="{{ route('members.rules') }}"
                   class="btn-membre btn btn-primary-ghost btn-ong">

                    <i class="fa-solid fa-user-plus"></i>

                    Devenir membre

                </a>

            @endif

        </div>

    </div>

</header>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const menuBtn = document.getElementById('menuBtn');

    const mobileMenu = document.getElementById('mobileMenu');

    const menuIcon = document.getElementById('menuIcon');

    // OUVRIR / FERMER
    menuBtn.addEventListener('click', function (e) {

        e.preventDefault();

        e.stopPropagation();

        mobileMenu.classList.toggle('active');

        // ICON
        if (mobileMenu.classList.contains('active')) {

            menuIcon.className = 'fa-solid fa-xmark';

        } else {

            menuIcon.className = 'fa-solid fa-bars';

        }

    });

    // FERMER SI CLICK SUR LIEN
    document.querySelectorAll('#navmenu a').forEach(link => {

        link.addEventListener('click', function () {

            mobileMenu.classList.remove('active');

            menuIcon.className = 'fa-solid fa-bars';

        });

    });

});

</script>
