@include("sections.admin.head")

<body>

@include("sections.admin.loader")

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

    @include("sections.admin.menuHaut")
    @include("sections.admin.menuGauche")

    <div id="content" class="content">

        <div class="container">

            <h2 class="mb-4 text-center">Gestion Media SSMA</h2>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ================= FORM UPLOAD ================= --}}
            <div class="card mb-4">
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="titre" class="form-control" placeholder="Titre">
                            </div>

                            <div class="col-md-4">
                                <select name="type" class="form-control">
                                    <option value="image">Image</option>
                                    <option value="video">Vidéo</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select name="event_id" class="form-control">
                                    <option value="">Choisir événement</option>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">
                                            {{ $event->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- DROPZONE --}}
                        <div id="dropzone" class="dropzone-box mt-3">
                            <p>Glisse tes fichiers ici ou clique</p>
                            <input type="file" name="files[]" multiple id="fileInput">
                        </div>

                        {{-- PREVIEW --}}
                        <div id="preview" class="row mt-3"></div>

                        <button class="btn btn-primary mt-3">Ajouter</button>

                        {{-- PROGRESS --}}
                        <div class="progress mt-3">
                            <div id="progressBar" class="progress-bar" style="width:0%">0%</div>
                        </div>

                    </form>

                </div>
            </div>

            {{-- ================= GALERIE ================= --}}
            <div class="row">

                @foreach($media as $m)

                    <div class="col-md-3 mb-3">

                        <div class="card shadow-sm">

                            @if($m->type == 'image')
                                <img src="{{ asset('storage/'.$m->file) }}"
                                     class="card-img-top"
                                     style="height:200px; object-fit:cover;">
                            @else
                                <video controls style="width:100%; height:200px;">
                                    <source src="{{ asset('storage/'.$m->file) }}">
                                </video>
                            @endif

                            <div class="card-body text-center">
                                <h6>{{ $m->titre }}</h6>
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>
    </div>

</div>

@include("sections.admin.script")

{{-- ================= CSS ================= --}}
<style>
    .dropzone-box {
        border: 2px dashed #aaa;
        padding: 40px;
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
    }

    .dropzone-box:hover {
        background: #f5f5f5;
    }
</style>

{{-- ================= JS CLEAN ================= --}}
<script>
    const dropzone = document.getElementById('dropzone');
    const input = document.getElementById('fileInput');
    const preview = document.getElementById('preview');

    dropzone.addEventListener('click', () => input.click());

    dropzone.addEventListener('dragover', e => {
        e.preventDefault();
    });

    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        input.files = e.dataTransfer.files;
        input.dispatchEvent(new Event('change'));
    });

    input.addEventListener('change', function () {

        preview.innerHTML = "";

        Array.from(this.files).forEach(file => {

            let reader = new FileReader();

            reader.onload = e => {
                preview.innerHTML += `
                    <div class="col-md-3 mb-2">
                        <img src="${e.target.result}" style="width:100%; border-radius:10px;">
                    </div>
                `;
            };

            reader.readAsDataURL(file);
        });
    });
</script>

</body>
</html>
