<!-- Section Head -->
@include("sections.admin.head")

<body>

@include("sections.admin.loader")

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

    {{-- MENU HAUT --}}
    @include("sections.admin.menuHaut")

    {{-- MENU GAUCHE --}}
    @include("sections.admin.menuGauche")

    {{-- CONTENT --}}
    <div id="content" class="content admin-content">

        {{-- HEADER --}}
        <div class="admin-page-header">

            <div>
                <h1 class="page-title">
                    Gestion des Membres
                </h1>

                <p class="page-subtitle">
                    Liste complète des membres inscrits SSMA
                </p>
            </div>

            <div class="admin-badge">
                <i class="fa-solid fa-users"></i>

                {{ $membres->count() }} Membres
            </div>

        </div>

        {{-- CARD --}}
        <div class="admin-card">

            {{-- TABLE RESPONSIVE --}}
            <div class="table-responsive">

                <table class="table premium-table align-middle">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Photo</th>

                            <th>Nom</th>

                            <th>Sexe</th>

                            <th>Naissance</th>

                            <th>Lieu</th>

                            <th>Profession</th>

                            <th>Téléphone</th>

                            <th>Status</th>

                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($membres as $membre)

                            <tr>

                                {{-- ID --}}
                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                {{-- PHOTO --}}
                                <td>

                                    @if($membre->photo)

                                        <img src="{{ asset('storage/'.$membre->photo) }}"
                                             class="member-photo">

                                    @else

                                        <img src="{{ asset('images/logo ssma.png') }}"
                                             class="member-photo">

                                    @endif

                                </td>

                                {{-- NOM --}}
                                <td class="fw-bold">

                                    {{ $membre->nom }}

                                </td>

                                {{-- SEXE --}}
                                <td>

                                    {{ $membre->sexe }}

                                </td>

                                {{-- DATE --}}
                                <td>

                                    {{ $membre->date_naissance }}

                                </td>

                                {{-- LIEU --}}
                                <td>

                                    {{ $membre->lieu_naissance }}

                                </td>

                                {{-- PROFESSION --}}
                                <td>

                                    {{ $membre->profession }}

                                </td>

                                {{-- TELEPHONE --}}
                                <td>

                                    {{ $membre->telephone }}

                                </td>

                                {{-- STATUS --}}
                                <td>

                                    <span class="status-badge

                                        @if($membre->status == 'accepte')
                                            status-success
                                        @elseif($membre->status == 'refuse')
                                            status-danger
                                        @else
                                            status-warning
                                        @endif

                                    ">

                                        @if($membre->status == 'accepte')

                                            <i class="fa-solid fa-circle-check"></i>

                                        @elseif($membre->status == 'refuse')

                                            <i class="fa-solid fa-circle-xmark"></i>

                                        @else

                                            <i class="fa-solid fa-clock"></i>

                                        @endif

                                        {{ ucfirst($membre->status) }}

                                    </span>

                                </td>

                                {{-- ACTIONS --}}
                                <td>

                                    <div class="action-buttons">

                                        {{-- ACCEPTER --}}
                                        @if($membre->status != 'accepte')

                                            <form action="{{ route('membre.accepter', $membre->id) }}"
                                                  method="POST">

                                                @csrf

                                                <button class="action-btn btn-success-custom">

                                                    <i class="fa-solid fa-check"></i>

                                                </button>

                                            </form>

                                        @endif

                                        {{-- REFUSER --}}
                                        @if($membre->status != 'refuse')

                                            <form action="{{ route('membre.refuser', $membre->id) }}"
                                                  method="POST">

                                                @csrf

                                                <button class="action-btn btn-danger-custom">

                                                    <i class="fa-solid fa-xmark"></i>

                                                </button>

                                            </form>

                                        @endif

                                        {{-- EN ATTENTE --}}
                                        @if($membre->status != 'en_attente')

                                            <form action="{{ route('membre.en_attente', $membre->id) }}"
                                                  method="POST">

                                                @csrf

                                                <button class="action-btn btn-warning-custom">

                                                    <i class="fa-solid fa-clock"></i>

                                                </button>

                                            </form>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- CONFIG --}}
    @include("sections.admin.config")

    {{-- SCROLL --}}
    <a href="javascript:;"
       class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
       data-click="scroll-top">

        <i class="fa fa-angle-up"></i>

    </a>

</div>

@include("sections.admin.script")

</body>