@extends('layouts.app')

@section('content')

<div class="register-container">

    <div class="register-box">

        <h2>Créer un compte</h2>

        {{-- ERREURS --}}
        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="nom" placeholder="Votre nom" required>
            </div>

            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Votre email" required>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                <i class="fa fa-eye toggle-password" onclick="togglePassword()"></i>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" required>
            </div>

            <button type="submit" class="btn-register">
                S'inscrire
            </button>

        </form>

        <p class="login-link">
            Déjà un compte ?
            <a href="{{ route('login') }}">Se connecter</a>
        </p>

    </div>

</div>

@endsection


<style>
    .register-container {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(120deg, #2E7D32, #4CAF50);
    }

    .register-box {
        background: white;
        padding: 40px;
        border-radius: 12px;
        width: 380px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        text-align: center;
    }

    .register-box h2 {
        margin-bottom: 20px;
        font-weight: bold;
    }

    .input-group {
        position: relative;
        margin-bottom: 15px;
    }

    .input-group input {
        width: 100%;
        padding: 12px 40px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .input-group i {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: #777;
    }

    .input-group .fa-user,
    .input-group .fa-envelope,
    .input-group .fa-lock {
        left: 12px;
    }

    .toggle-password {
        right: 12px;
        cursor: pointer;
    }

    .btn-register {
        width: 100%;
        padding: 12px;
        background: #2E7D32;
        color: white;
        border: none;
        border-radius: 8px;
        margin-top: 10px;
        font-weight: bold;
    }

    .btn-register:hover {
        background: #1b5e20;
    }

    .login-link {
        margin-top: 15px;
    }

    .alert-error {
        background: #ffebee;
        color: red;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 8px;
    }
</style>

<script>
    function togglePassword() {
        let input = document.getElementById("password");
        input.type = input.type === "password" ? "text" : "password";
    }
</script>
