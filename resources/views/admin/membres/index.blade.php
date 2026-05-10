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

<style>

/* PAGE */

.admin-content{
    padding:30px;
    background:#f4f7fb;
    min-height:100vh;
}

/* HEADER */

.admin-page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    margin-bottom:30px;
}

.page-title{
    font-size:38px;
    font-weight:900;
    color:#111;
    margin-bottom:8px;
}

.page-subtitle{
    color:#777;
    margin:0;
}

.admin-badge{
    background:white;
    padding:14px 22px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    font-weight:700;
    display:flex;
    align-items:center;
    gap:10px;
}

/* CARD */

.admin-card{
    background:white;
    border-radius:30px;
    padding:25px;
    box-shadow:0 15px 40px rgba(0,0,0,0.06);
    overflow:hidden;
}

/* TABLE */

.premium-table{
    margin:0;
    min-width:1100px;
}

.premium-table thead{
    background:#111827;
    color:white;
}

.premium-table thead th{
    padding:18px;
    border:none;
    font-size:14px;
    font-weight:700;
    white-space:nowrap;
}

.premium-table tbody td{
    padding:18px;
    vertical-align:middle;
    border-color:#f1f1f1;
    white-space:nowrap;
}

.premium-table tbody tr{
    transition:0.3s;
}

.premium-table tbody tr:hover{
    background:#f8fbff;
}

/* PHOTO */

.member-photo{
    width:55px;
    height:55px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #f1f1f1;
}

/* STATUS */

.status-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 16px;
    border-radius:50px;
    font-size:13px;
    font-weight:700;
}

.status-success{
    background:#d1fae5;
    color:#065f46;
}

.status-danger{
    background:#fee2e2;
    color:#991b1b;
}

.status-warning{
    background:#fef3c7;
    color:#92400e;
}

/* ACTIONS */

.action-buttons{
    display:flex;
    align-items:center;
    gap:10px;
}

.action-btn{
    width:40px;
    height:40px;
    border:none;
    border-radius:12px;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    transition:0.3s;
}

.action-btn:hover{
    transform:translateY(-3px);
}

.btn-success-custom{
    background:#10b981;
}

.btn-danger-custom{
    background:#ef4444;
}

.btn-warning-custom{
    background:#f59e0b;
}

/* MOBILE */

@media(max-width:768px){

    .admin-content{
        padding:15px;
    }

    .admin-page-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .page-title{
        font-size:28px;
    }

    .admin-card{
        padding:15px;
        border-radius:20px;
    }

    .premium-table thead th,
    .premium-table tbody td{
        padding:14px;
        font-size:13px;
    }

    .member-photo{
        width:45px;
        height:45px;
    }

}

</style>