
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/Elegant Brown B Book Logo Icon.png') }}">



    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
@extends('layout')
@section('title','Login.now')


<body class="auth-page">

@section('content')


<div class="auth-wrapper">
    <div class="auth-container">

        <section class="auth-side">
            <a href="{{ url('/') }}" class="auth-brand">Bookish.</a>
    @if (Session::has('message'))
<div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
@if (session('Error'))
    <div class="alert alert-danger">
        {{ session('Error') }}
    </div>
@endif
            <div class="auth-decoration"></div>

            <h2>Welcome Back, Reader!</h2>

            <p>
                Your next favorite book is waiting for you.
                Sign in and continue your reading journey
                with Bookish.
            </p>
        </section>

        <main class="auth-main">
            <form class="auth-form"
                  action="{{ route('loginAccount') }}"
                  method="POST"
                  autocomplete="off">

                @csrf

                <h1>Sign In</h1>

                <p class="auth-subtitle">
                    Enter your details to access your account.
                </p>


                <div class="auth-field">
                    <label for="email">Email Address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="you@example.com"
                        value=""
                        autocomplete="off"
                        autocapitalize="none"
                        spellcheck="false"

                    >
                    @error('email')
                    <p style="color: red;" > .{{$message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="new-password"

                    >
                    @error('password')
                    <p style="color: red;" > .{{$message }}</p>
                    @enderror
                </div>

                <div class="auth-options">
                    <label class="auth-check" for="remember">
                        <input type="checkbox" name="remember" id="remember" value="1">
                        Remember me
                    </label>

                    <a href="">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="auth-button">
                    Sign In
                </button>

                <p class="auth-switch">
                    Don't have an account?
                    <a href="{{ route('register') }}">Create one</a>
                </p>

            </form>
        </main>

    </div>
</div>
<script>

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.auth-form');

    if (!form) return;

    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const submitButton = form.querySelector('.auth-button');

    // Add visual styles
    const style = document.createElement('style');

    style.textContent = `
        .auth-field {
            position: relative;
        }

        .auth-field input {
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .auth-field input:focus {
            outline: none;
            border-color: #d5a65b;
            box-shadow: 0 0 0 3px rgba(213, 166, 91, .15);
        }

        .auth-field input.input-valid {
            border-color: #198754;
        }

        .auth-field input.input-invalid {
            border-color: #dc3545;
        }

        .field-feedback {
            margin-top: 6px;
            font-size: 12px;
        }

        .field-feedback.valid {
            color: #198754;
        }

        .field-feedback.invalid {
            color: #dc3545;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 75px;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #806044;
            font-size: 12px;
            cursor: pointer;
        }

        .password-toggle:hover {
            color: #d5a65b;
        }

        .auth-button {
            transition: opacity .2s ease, transform .2s ease;
        }

        .auth-button:disabled {
            opacity: .75;
            cursor: wait;
        }

        .auth-button .login-spinner {
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-right: 8px;
            border: 2px solid rgba(255,255,255,.45);
            border-top-color: #fff;
            border-radius: 50%;
            animation: login-spin .7s linear infinite;
            vertical-align: middle;
        }

        @keyframes login-spin {
            to { transform: rotate(360deg); }
        }
    `;

    document.head.appendChild(style);

    // Password show / hide
    const passwordWrapper = document.createElement('div');
    passwordWrapper.className = 'password-wrapper';

    password.parentNode.insertBefore(passwordWrapper, password);
    passwordWrapper.appendChild(password);

    const toggleButton = document.createElement('button');
    toggleButton.type = 'button';
    toggleButton.className = 'password-toggle';
    toggleButton.textContent = 'Show';
    toggleButton.setAttribute('aria-label', 'Show password');

    passwordWrapper.appendChild(toggleButton);

    toggleButton.addEventListener('click', function () {
        const isPassword = password.type === 'password';

        password.type = isPassword ? 'text' : 'password';
        toggleButton.textContent = isPassword ? 'Hide' : 'Show';

        toggleButton.setAttribute(
            'aria-label',
            isPassword ? 'Hide password' : 'Show password'
        );
    });

    // Email feedback element
    const emailFeedback = document.createElement('div');
    emailFeedback.className = 'field-feedback';
    email.insertAdjacentElement('afterend', emailFeedback);

    function validateEmailFormat() {
        const value = email.value.trim();

        email.classList.remove('input-valid', 'input-invalid');
        emailFeedback.className = 'field-feedback';
        emailFeedback.textContent = '';

        if (!value) return;

        if (email.validity.typeMismatch ||
            !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            email.classList.add('input-invalid');
            emailFeedback.classList.add('invalid');
            emailFeedback.textContent = 'Please enter a valid email address.';
            return;
        }

        email.classList.add('input-valid');
        emailFeedback.classList.add('valid');
        emailFeedback.textContent = 'Email format looks good.';
    }

    email.addEventListener('input', validateEmailFormat);
    email.addEventListener('blur', validateEmailFormat);

    // Clear old Laravel validation messages when the user edits a field.
    function clearLaravelError(input) {
        const field = input.closest('.auth-field');

        if (!field) return;

        const errorParagraphs = field.querySelectorAll('p');

        errorParagraphs.forEach(function (paragraph) {
            if (!paragraph.classList.contains('field-feedback')) {
                paragraph.style.display = 'none';
            }
        });
    }

    [email, password].forEach(function (input) {
        input.addEventListener('input', function () {
            clearLaravelError(input);
        });
    });

    // Loading state on form submission.
    // Native browser validation and Laravel's server validation remain enabled.
    form.addEventListener('submit', function () {
        if (!form.checkValidity()) return;

        if (submitButton.disabled) return;

        submitButton.disabled = true;
        submitButton.setAttribute('aria-busy', 'true');

        submitButton.innerHTML =
            '<span class="login-spinner" aria-hidden="true"></span>' +
            'Signing In...';
    });
});

</script>
@endsection
</body>
</html>
