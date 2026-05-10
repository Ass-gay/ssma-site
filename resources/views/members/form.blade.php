@extends('layouts.app')

@section('content')

    <h1>Formulaire d’adhésion SSMA</h1>

    <div class="container ssma-container">
        {{-- succès --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- erreurs globales --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="addForm" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">

                <div class="col-lg-6 col-12">
                    <label>Nom complet *</label>
                    <input type="text" name="nom"
                        class="form-control @error('nom') is-invalid @enderror"
                        value="{{ old('nom') }}" placeholder="Le nom complet" required>
                    @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-6 col-12">
                    <label>Sexe *</label>
                    <select name="sexe"
                            class="form-control @error('sexe') is-invalid @enderror">
                        <option value="">Choisir</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                    @error('sexe') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-6 col-12">
                    <label>Date de naissance</label>
                    <input type="date" name="date_naissance" class="form-control">
                </div>

                <div class="col-lg-6 col-12">
                    <label>Lieu de naissance *</label>
                    <input type="text" name="lieu_naissance"
                        class="form-control @error('lieu_naissance') is-invalid @enderror"
                        value="{{ old('lieu_naissance') }}" placeholder="Lieu de naissance" required>
                    @error('lieu_naissance') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-6 col-12">
                    <label>Adresse *</label>
                    <input type="text" name="adresse"
                        class="form-control @error('adresse') is-invalid @enderror"
                        value="{{ old('adresse') }}" placeholder="Entrez votre adresse" required>
                    @error('adresse') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-6 col-12">
                    <label>Profession</label>
                    <input type="text" name="profession"
                        class="form-control"
                        value="{{ old('profession') }}" placeholder="Profession" required>
                </div>

                <div class="col-lg-6 col-12">
                    <label>Téléphone *</label>
                    <input type="tel" name="telephone"
                        id="phoneInput"
                        class="form-control @error('telephone') is-invalid @enderror"
                        value="{{ old('telephone') }}" placeholder="Numéro de téléphone">
                    @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-lg-6 col-12">
                    <label>Photo</label>
                    <input type="file" name="photo" id="photoInput" class="form-control">
                </div>

            </div>

            <div class="text-center mt-4">
                <button class="btn btn-success btn-lg ssma-btn">
                    Envoyer
                </button>
            </div>

        </form>
    </div>
@endsection

@push('scripts')
<script>
/* ===== VALIDATION JS ===== */
document.getElementById('addForm').addEventListener('submit', function(e) {

    let nom = document.querySelector('[name="nom"]');
    let tel = document.querySelector('[name="telephone"]');

    if (nom.value.trim() === '') {
        alert("Nom obligatoire");
        e.preventDefault();
    }

    if (tel.value.length < 8) {
        alert("Numéro invalide");
        e.preventDefault();
    }
});

/* ===== FORMAT TELEPHONE ===== */
document.getElementById('phoneInput').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9+]/g, '');
});

// changer placeholder
const input = document.querySelector("#phoneInput");

const iti = window.intlTelInput(input, {
    initialCountry: "sn",
    preferredCountries: ["sn", "fr", "ci", "ma"],
    separateDialCode: true,
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
});

/* 🔥 CHANGER PLACEHOLDER SELON PAYS */
function updatePlaceholder() {
    const placeholder = input.getAttribute("placeholder");
    input.setAttribute("placeholder", placeholder);
}

/* quand on change de pays */
input.addEventListener("countrychange", function () {
    const countryData = iti.getSelectedCountryData();

    // format exemple basé sur indicatif
    input.setAttribute(
        "placeholder",
        "+" + countryData.dialCode + " XX XXX XX XX"
    );
});

/* submit */
document.querySelector("form").addEventListener("submit", function () {
    input.value = iti.getNumber(); // format +221...
});
</script>
@endpush
