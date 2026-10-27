<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/Elegant Brown B Book Logo Icon.png') }}">

<title>
Create An Account
</title>

    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    @extends('layout')
@section('title','Login.now')


</head>



<body class="auth-page">
@section('content')
<div class="auth-wrapper">
    <div class="auth-container">

        <section class="auth-side">
            <a href="{{ url('/') }}" class="auth-brand">Bookish.</a>

            <div class="auth-decoration"></div>

            <h2>Every Book Opens a New World.</h2>

            <p>
                Join our reading community, discover inspiring
                stories, and find books that match your interests.
                Your journey starts here.
            </p>
        </section>

        <main class="auth-main">
            <form class="auth-form"
                  action="{{ route('storeAccount') }}"
                  method="POST">

                @csrf

                <h1>Create Account</h1>

                <p class="auth-subtitle">
                    Join Bookish and discover your next favorite read.
                </p>

                <div class="auth-field">
                    <label for="name">Full Name</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter your full name"
                        autocomplete="name"
                    >
                    @error('name')
                    <p style="color: red;" > .{{$message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="email">Email Address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="you@example.com"
                        autocomplete="email"

                    >
                    @error('email')
                    <p style="color: red;" > .{{$message }}</p>
                    @enderror
                </div>
                <div class="auth-field">
                    <label for="phone_number">phone number</label>

                    <input
                        type="text"
                        id="phone_number"
                        name="phone_number"
                        value="{{ old('phone_number') }}"
                        placeholder="Enter your Phone number"
                        autocomplete="phone_number"

                    >
                    @error('phone_number')
                    <p style="color: red;" > .{{$message }}</p>
                    @enderror
                </div>

                <div class="auth-field">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create a password"
                        autocomplete="new-password"

                    >
                    @error('password')
                    <p style="color: red;" > .{{$message }}</p>
                    @enderror
                </div>


                <div class="auth-field">
                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repeat your password"
                        autocomplete="new-password"

                    >
                    @error('password_confirmation')
                    <p style="color: red;" > .{{$message }}</p>
                    @enderror
                </div>

                <button type="submit" class="auth-button">
                    Create Account
                </button>

                <p class="auth-switch">
                    Already have an account?
                    <a href="{{ route('login') }}">Sign in</a>
                </p>
            </form>
        </main>

    </div>
</div>
<script>

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.auth-form');

    if (!form) return;

    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone_number');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const submitButton = form.querySelector('.auth-button');

    // Add styles for form interactions
    const style = document.createElement('style');

    style.textContent = `
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
            display: block;
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
            top: 50%;
            right: 12px;
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

        .strength-bars {
            display: flex;
            gap: 5px;
            margin-top: 10px;
        }

        .strength-bars span {
            height: 4px;
            flex: 1;
            border-radius: 5px;
            background: #e8dfd3;
            transition: background .2s ease;
        }

        .strength-text {
            margin-top: 6px;
            color: #806044;
            font-size: 11px;
        }

        .auth-button:disabled {
            opacity: .75;
            cursor: wait;
        }

        .register-spinner {
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-right: 8px;
            border: 2px solid rgba(255, 255, 255, .45);
            border-top-color: #fff;
            border-radius: 50%;
            animation: register-spin .7s linear infinite;
            vertical-align: middle;
        }

        @keyframes register-spin {
            to {
                transform: rotate(360deg);
            }
        }
    `;

    document.head.appendChild(style);

    // Create feedback elements
    function createFeedback(input) {
        const feedback = document.createElement('small');
        feedback.className = 'field-feedback';
        input.insertAdjacentElement('afterend', feedback);
        return feedback;
    }

    const feedbacks = {
        name: createFeedback(name),
        email: createFeedback(email),
        phone: createFeedback(phone),
        password: createFeedback(password),
        confirmPassword: createFeedback(confirmPassword)
    };

    // Add password visibility buttons
    [password, confirmPassword].forEach(function (input) {
        const wrapper = document.createElement('div');
        wrapper.className = 'password-wrapper';

        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);

        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'password-toggle';
        button.textContent = 'Show';
        button.setAttribute('aria-label', 'Show password');

        wrapper.appendChild(button);

        button.addEventListener('click', function () {
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            button.textContent = isHidden ? 'Hide' : 'Show';

            button.setAttribute(
                'aria-label',
                isHidden ? 'Hide password' : 'Show password'
            );
        });
    });

    // Display field feedback
    function setFeedback(input, feedback, message, isValid) {
        feedback.textContent = message;
        feedback.className = 'field-feedback';

        input.classList.remove('input-valid', 'input-invalid');

        if (!message) return;

        feedback.classList.add(isValid ? 'valid' : 'invalid');
        input.classList.add(isValid ? 'input-valid' : 'input-invalid');
    }

    // Validate full name
    function validateName() {
        const value = name.value.trim();

        if (!value) {
            setFeedback(name, feedbacks.name, 'Please enter your full name.', false);
            return false;
        }

        if (value.length > 255) {
            setFeedback(name, feedbacks.name, 'Name must not exceed 255 characters.', false);
            return false;
        }

        setFeedback(name, feedbacks.name, 'Name looks good.', true);
        return true;
    }

    // Validate email format
    function validateEmail() {
        const value = email.value.trim();

        if (!value) {
            setFeedback(email, feedbacks.email, 'Email address is required.', false);
            return false;
        }

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            setFeedback(email, feedbacks.email, 'Enter a valid email address.', false);
            return false;
        }

        setFeedback(email, feedbacks.email, 'Email format looks good.', true);
        return true;
    }

    // Validate phone number
    function validatePhone() {
        const value = phone.value.trim();

        if (!value) {
            setFeedback(phone, feedbacks.phone, 'Phone number is required.', false);
            return false;
        }

        if (value.length > 20) {
            setFeedback(phone, feedbacks.phone, 'Phone number must not exceed 20 characters.', false);
            return false;
        }

        setFeedback(phone, feedbacks.phone, 'Phone number entered.', true);
        return true;
    }

    // Password strength indicator
    const strengthBars = document.createElement('div');
    strengthBars.className = 'strength-bars';

    for (let i = 0; i < 4; i++) {
        strengthBars.appendChild(document.createElement('span'));
    }

    const strengthText = document.createElement('div');
    strengthText.className = 'strength-text';
    strengthText.textContent = 'Password strength';

    feedbacks.password.insertAdjacentElement('afterend', strengthBars);
    strengthBars.insertAdjacentElement('afterend', strengthText);

    function validatePassword() {
        const value = password.value;
        let score = 0;

        if (value.length >= 8) score++;
        if (/[a-z]/.test(value) && /[A-Z]/.test(value)) score++;
        if (/[0-9]/.test(value)) score++;
        if (/[^a-zA-Z0-9]/.test(value)) score++;

        const colors = ['#e8dfd3', '#dc3545', '#f0ad4e', '#198754', '#198754'];

        strengthBars.querySelectorAll('span').forEach(function (bar, index) {
            bar.style.background = index < score ? colors[score] : '#e8dfd3';
        });

        const labels = [
            'Password strength',
            'Weak password',
            'Fair password',
            'Strong password',
            'Very strong password'
        ];

        strengthText.textContent = value ? labels[score] : 'Password strength';

        if (!value) {
            setFeedback(password, feedbacks.password, 'Password is required.', false);
            validateConfirmPassword();
            return false;
        }

        if (value.length < 8) {
            setFeedback(password, feedbacks.password, 'Use at least 8 characters.', false);
            validateConfirmPassword();
            return false;
        }

        setFeedback(password, feedbacks.password, 'Password meets the minimum length.', true);
        validateConfirmPassword();

        return true;
    }

    // Confirm password
    function validateConfirmPassword() {
        const value = confirmPassword.value;

        if (!value) {
            setFeedback(
                confirmPassword,
                feedbacks.confirmPassword,
                password.value ? 'Please confirm your password.' : '',
                false
            );

            return false;
        }

        if (value !== password.value) {
            setFeedback(
                confirmPassword,
                feedbacks.confirmPassword,
                'Passwords do not match.',
                false
            );

            return false;
        }

        setFeedback(
            confirmPassword,
            feedbacks.confirmPassword,
            'Passwords match.',
            true
        );

        return true;
    }

    // Remove old Laravel errors when editing a field
    function clearLaravelError(input) {
        const field = input.closest('.auth-field');

        if (!field) return;

        field.querySelectorAll('p').forEach(function (paragraph) {
            paragraph.style.display = 'none';
        });
    }

    [name, email, phone, password, confirmPassword].forEach(function (input) {
        input.addEventListener('input', function () {
            clearLaravelError(input);
        });
    });

    // Validate when the user leaves each field
    name.addEventListener('blur', validateName);
    email.addEventListener('blur', validateEmail);
    phone.addEventListener('blur', validatePhone);
    password.addEventListener('input', validatePassword);
    confirmPassword.addEventListener('input', validateConfirmPassword);

    // Submit form
    form.addEventListener('submit', function (event) {
        const nameValid = validateName();
        const emailValid = validateEmail();
        const phoneValid = validatePhone();
        const passwordValid = validatePassword();
        const confirmationValid = validateConfirmPassword();

        if (
            !nameValid ||
            !emailValid ||
            !phoneValid ||
            !passwordValid ||
            !confirmationValid
        ) {
            event.preventDefault();

            const firstInvalid = [
                [name, nameValid],
                [email, emailValid],
                [phone, phoneValid],
                [password, passwordValid],
                [confirmPassword, confirmationValid]
            ].find(function (item) {
                return !item[1];
            });

            if (firstInvalid) firstInvalid[0].focus();

            return;
        }

        if (submitButton.disabled) {
            event.preventDefault();
            return;
        }

        submitButton.disabled = true;
        submitButton.setAttribute('aria-busy', 'true');

        submitButton.innerHTML =
            '<span class="register-spinner" aria-hidden="true"></span>' +
            'Creating Account...';
    });
});

</script>
@endsection
</body>
</html>
