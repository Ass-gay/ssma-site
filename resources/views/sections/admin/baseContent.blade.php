<div id="content" class="content dashboard-premium">

    {{-- BREADCRUMB --}}
    <ol class="breadcrumb dashboard-breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">
                SSMA
            </a>
        </li>

        <li class="breadcrumb-item active">
            Dashboard
        </li>
    </ol>

    {{-- HEADER --}}
    <div class="dashboard-header">

        <div>
            <h1 class="dashboard-title">
                Tableau de Bord SSMA
            </h1>

            <p class="dashboard-subtitle">
                Gestion intelligente de la plateforme SSMA
            </p>
        </div>

        <div class="dashboard-date">
            <i class="fa-solid fa-calendar-days"></i>

            {{ now()->format('d M Y') }}
        </div>

    </div>

    {{-- STATS --}}
    <div class="row g-4">

        {{-- MEMBRES --}}
        <div class="col-xl-3 col-md-6">

            <div class="stats-card members-card">

                <div class="stats-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div class="stats-content">

                    <span>Membres</span>

                    <h2>

                        {{ $membresCount }}

                    </h2>

                    <p>
                        Membres enregistrés
                    </p>

                </div>

            </div>

        </div>

        {{-- MEDIA --}}
        <div class="col-xl-3 col-md-6">

            <div class="stats-card media-card">

                <div class="stats-icon">
                    <i class="fa-solid fa-photo-film"></i>
                </div>

                <div class="stats-content">

                    <span>Médias</span>

                    <h2>

                        {{ $mediasCount }}

                    </h2>

                    <p>
                        Photos & vidéos
                    </p>

                </div>

            </div>

        </div>

        {{-- BOOKS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stats-card books-card">

                <div class="stats-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <div class="stats-content">

                    <span>Bibliothèque</span>

                    <h2>

                        {{ $booksCount }}

                    </h2>

                    <p>
                        PDF & Audio
                    </p>

                </div>

            </div>

        </div>

        {{-- EVENTS --}}
        <div class="col-xl-3 col-md-6">

            <div class="stats-card events-card">

                <div class="stats-icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <div class="stats-content">

                    <span>Événements</span>

                    <h2>

                        {{ $eventsCount }}

                    </h2>

                    <p>
                        Activités publiées
                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- SECOND SECTION --}}
    <div class="row mt-4">

        {{-- ACTIVITÉS --}}
        <div class="col-lg-8">

            <div class="dashboard-box">

                <div class="box-header">

                    <h4>

                        <i class="fa-solid fa-chart-line"></i>

                        Activités récentes

                    </h4>

                </div>

                <div class="activity-list">

                    {{-- MEMBER --}}
                    <div class="activity-item">

                        <div class="activity-icon bg-primary">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>

                        <div>
                            <h6>
                                {{ $membresCount }} membres enregistrés
                            </h6>

                            <small>
                                Base de données SSMA
                            </small>
                        </div>

                    </div>

                    {{-- MEDIA --}}
                    <div class="activity-item">

                        <div class="activity-icon bg-danger">
                            <i class="fa-solid fa-photo-film"></i>
                        </div>

                        <div>
                            <h6>
                                {{ $mediasCount }} médias publiés
                            </h6>

                            <small>
                                Galerie mise à jour
                            </small>
                        </div>

                    </div>

                    {{-- BOOKS --}}
                    <div class="activity-item">

                        <div class="activity-icon bg-success">
                            <i class="fa-solid fa-book"></i>
                        </div>

                        <div>
                            <h6>
                                {{ $booksCount }} documents disponibles
                            </h6>

                            <small>
                                Bibliothèque SSMA
                            </small>
                        </div>

                    </div>

                    {{-- EVENTS --}}
                    <div class="activity-item border-0">

                        <div class="activity-icon bg-warning">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>

                        <div>
                            <h6>
                                {{ $eventsCount }} événements publiés
                            </h6>

                            <small>
                                Activités SSMA
                            </small>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- QUICK ACTIONS --}}
        <div class="col-lg-4">

            <div class="dashboard-box quick-box">

                <div class="box-header">

                    <h4>

                        <i class="fa-solid fa-bolt"></i>

                        Actions rapides

                    </h4>

                </div>

                <div class="quick-actions">

                    <a href="{{route('admin.users.index')}}" class="quick-btn">
                        <i class="fa-solid fa-user-shield"></i>
                        Ajouter Admin
                    </a>

                    <a href="{{route('admin.membres.index')}}" class="quick-btn">
                        <i class="fa-solid fa-user-plus"></i>
                        Voir membre inscrit
                    </a>

                    <a href="{{route('admin.media.index')}}" class="quick-btn">
                        <i class="fa-solid fa-photo-film"></i>
                        Ajouter média
                    </a>

                    <a href="{{route('admin.books.index')}}" class="quick-btn">
                        <i class="fa-solid fa-book-open"></i>
                        Ajouter PDF
                    </a>

                    <a href="{{route('admin.events.index')}}" class="quick-btn">
                        <i class="fa-solid fa-calendar-plus"></i>
                        Ajouter événement
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>