@include("sections.admin.head")

<body>

@include("sections.admin.loader")

<div id="page-container"
     class="fade page-sidebar-fixed page-header-fixed">

    {{-- HEADER --}}
    @include("sections.admin.menuHaut")

    {{-- SIDEBAR --}}
    @include("sections.admin.menuGauche")

    {{-- CONTENT --}}
    <div id="content" class="content">

        <h1 class="page-header">
            Gestion des Sections
        </h1>

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="card">

            <div class="card-body">

                <form action="{{ route('admin.sections.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Nom section
                        </label>

                        <input type="text"
                               name="nom"
                               class="form-control"
                               placeholder="Nom section">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Type
                        </label>

                        <select name="type"
                                class="form-select">

                            <option value="regionale">
                                Régionale
                            </option>

                            <option value="departementale">
                                Départementale
                            </option>

                            <option value="diaspora">
                                Diaspora
                            </option>

                        </select>

                    </div>

                    <button class="btn btn-dark">

                        Ajouter

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@include("sections.admin.script")

</body>
