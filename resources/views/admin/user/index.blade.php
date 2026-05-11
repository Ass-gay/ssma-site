@include("sections.admin.head")

<body>

@include("sections.admin.loader")

<div id="page-container"
     class="fade page-sidebar-fixed page-header-fixed">

    {{-- MENU --}}
    @include("sections.admin.menuHaut")
    @include("sections.admin.menuGauche")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- CONTENT --}}
    <div id="content"
         class="content admin-users-page">

        {{-- HEADER --}}
        <div class="users-header">

            <div>

                <h1 class="users-title">

                    Gestion des Administrateurs

                </h1>

                <p class="users-subtitle">

                    Ajouter et gérer les comptes administrateurs SSMA

                </p>

            </div>

            <div class="users-badge">

                <i class="fa-solid fa-user-shield"></i>

                Administration

            </div>

        </div>

        {{-- ALERT --}}
        @if(session('success'))

            <div class="alert alert-success premium-alert">

                <i class="fa-solid fa-circle-check"></i>

                {{ session('success') }}

            </div>

        @endif

        {{-- FORM --}}
        <div class="row g-4">

            <div class="col-lg-5">

                <div class="premium-card">

                    <div class="card-top">

                        <h3>

                            <i class="fa-solid fa-user-plus"></i>

                            Ajouter Administrateur

                        </h3>

                    </div>

                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        {{-- nom --}}
                        <div class="form-group mb-4">

                            <label>

                                Nom complet

                            </label>

                            <div class="input-box">

                                <i class="fa-solid fa-user"></i>

                                <input type="text"
                                       name="nom"
                                       class="form-control"
                                       placeholder="Entrer le nom">

                            </div>

                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group mb-4">

                            <label>

                                Adresse Email

                            </label>

                            <div class="input-box">

                                <i class="fa-solid fa-envelope"></i>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Entrer l’email">

                            </div>

                        </div>

                        {{-- PASSWORD --}}
                        <div class="form-group mb-4">

                            <label>

                                Mot de passe

                            </label>

                            <div class="input-box">

                                <i class="fa-solid fa-lock"></i>

                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="Mot de passe">

                            </div>

                        </div>

                        {{-- ROLE --}}
                        <div class="form-group mb-4">

                            <label>

                                Rôle utilisateur

                            </label>

                            <div class="input-box">

                                <i class="fa-solid fa-user-shield"></i>

                                <select name="role"
                                        class="form-select">

                                    <option value="admin">

                                        admin

                                    </option>

                                    <option value="user">

                                        user

                                    </option>

                                </select>

                            </div>

                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                                class="btn-save">

                            <i class="fa-solid fa-floppy-disk"></i>

                            Ajouter Administrateur

                        </button>

                    </form>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-lg-7">

                <div class="premium-card">

                    <div class="card-top">

                        <h3>

                            <i class="fa-solid fa-users"></i>

                            Liste des utilisateurs

                        </h3>

                    </div>

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Nom</th>

                                    <th>Email</th>

                                    <th>Rôle</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($users as $user)

                                    <tr>

                                        <td>

                                            {{ $loop->iteration }}

                                        </td>

                                        <td>

                                            <div class="user-nom">

                                                <div class="user-avatar">

                                                    {{ strtoupper(substr($user->nom,0,1)) }}

                                                </div>

                                                {{ $user->nom }}

                                            </div>

                                        </td>

                                        <td>

                                            {{ $user->email }}

                                        </td>

                                        <td>

                                            @if($user->role == 'admin')

                                                <span class="badge-admin">

                                                    Admin

                                                </span>

                                            @else

                                                <span class="badge-user">

                                                    User

                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@include("sections.admin.script")

</body>