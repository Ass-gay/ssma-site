@extends('layouts.app')

@section('content')

<div class="login-page">

    <div class="login-card">

        <h2 class="title">Se connecter</h2>
        <div class="underline"></div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Votre adresse e-mail" required>
            </div>

            <!-- PASSWORD -->
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                <i class="fa fa-eye toggle" onclick="togglePassword()" id="eyeIcon"></i>
            </div>

            <!-- OPTIONS -->
            <div class="options">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn-login">
                Se connecter <i class="fa fa-arrow-right"></i>
            </button>

        </form>

        <div class="divider">Vous n'avez pas de compte ?</div>

        <a href="{{ route('register') }}" class="btn-register">
            Créer votre compte SSMA
        </a>

    </div>

</div>

@endsection

<style>
    .login-page {
    height: 100vh;
    background: #eef2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .login-card {
        background: white;
        padding: 40px;
        width: 480px;
        height: 480px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        text-align: center;
    }

    .title {
        margin-bottom: 5px;
    }

    .underline {
        width: 50px;
        height: 4px;
        background: #2E7D32;
        margin: 10px auto 20px;
        border-radius: 10px;
    }

    /* INPUT */
    .input-group {
        position: relative;
        margin-bottom: 15px;
    }

    .input-group i {
        position: absolute;
        top: 12px;
        left: 12px;
        color: #999;
    }

    .input-group input {
        width: 100%;
        padding: 12px 12px 12px 35px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    /* EYE ICON */
    .input-group .toggle {
        right: 12px;
        left: auto;
        cursor: pointer;
    }

    /* OPTIONS */
    .options {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        margin-bottom: 15px;
    }

    /* BUTTON */
    .btn-login {
        width: 100%;
        padding: 12px;
        background: #2E7D32;
        color: white;
        border: none;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: #222222;
    }

    /* DIVIDER */
    .divider {
        margin: 20px 0;
        font-size: 13px;
        color: #777;
    }

    /* REGISTER */
    .btn-register {
        display: block;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        text-decoration: none;
        color: #2E7D32;
    }
</style>

<script>
    function togglePassword() {
        let input = document.getElementById('password');
        let icon = document.getElementById('eyeIcon');

        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }
</script>
