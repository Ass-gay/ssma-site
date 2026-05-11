<div id="header" class="header navbar-default">

  <!-- LOGO / NOM -->
  <div class="navbar-header">
    <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
      {{-- <span class="navbar-logo"></span> --}}
      <b>SSMA</b> Admin
    </a>

    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <ul class="navbar-nav navbar-right">

    <!-- 🔍 SEARCH (optionnel) -->
    <li class="navbar-form">
      <form action="" method="GET">
        <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Rechercher..." />
          <button type="submit" class="btn btn-search">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>
    </li>

    <!-- 🔔 NOTIFICATIONS -->
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
        <i class="fa fa-bell"></i>
        <span class="label">0</span>
      </a>

      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header">Notifications</div>

        <div class="dropdown-item text-center text-muted">
          Aucune notification
        </div>
      </div>
    </li>

    <!-- 👤 UTILISATEUR CONNECTÉ -->
    <li class="dropdown navbar-user">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">

        <!-- IMAGE -->
        <img src="{{ asset('images/logo-ssma.png') }}" alt="user" />

        <!-- NOM DYNAMIQUE -->
        <span class="d-none d-md-inline">
          {{ Auth::user()->nom ?? 'Admin' }}
        </span>

        <b class="caret"></b>
      </a>

      <div class="dropdown-menu dropdown-menu-right">

        <!-- PROFIL -->
        <a href="{{ route('profile.edit') }}" class="dropdown-item">
          Modifier profil
        </a>

        <div class="dropdown-divider"></div>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="dropdown-item">
            Déconnexion
          </button>
        </form>

      </div>
    </li>

  </ul>

</div>
