<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="icon" type="image/png" href="{{ asset('assets/images/Elegant Brown B Book Logo Icon.png') }}">

    <title> Add New Admin</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        :root {
            --wood: #432719;
            --wood-light: #5b3825;
            --gold: #d5a65b;
            --cream: #fffaf2;
            --border: #e5d4ba;
            --text: #432719;
            --muted: #806044;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: var(--cream);
            color: var(--text);
        }

        /* Navbar */

        .navbar {
            background: var(--wood);
            padding: 17px 0;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.12);
        }

        .navbar-brand {
            color: var(--cream);
            font-size: 27px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .navbar-brand span {
            color: var(--gold);
        }

        .navbar-brand:hover {
            color: var(--cream);
        }

        .admin-label {
            color: #e5d4ba;
            font-size: 13px;
        }

        /* Main Layout */

        .page-container {
            min-height: calc(100vh - 75px);
            padding: 55px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-card {
            width: 100%;
            max-width: 700px;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 12px 40px rgba(67, 39, 25, 0.10);
        }

        /* Card Header */

        .card-header-custom {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 30px 35px;
            background: var(--wood);
            color: var(--cream);
        }

        .header-icon {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gold);
            color: var(--wood);
            border-radius: 14px;
            font-size: 24px;
        }

        .card-header-custom h1 {
            margin: 0 0 7px;
            font-size: 25px;
            font-weight: 700;
        }

        .card-header-custom p {
            margin: 0;
            color: #e5d4ba;
            font-size: 13px;
        }

        /* Form */

        .card-body-custom {
            padding: 35px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
            color: var(--wood);
            font-size: 17px;
            font-weight: 600;
        }

        .section-title i {
            color: #b88a42;
        }

        .form-label {
            margin-bottom: 9px;
            color: var(--text);
            font-size: 13px;
            font-weight: 600;
        }

        .form-control {
            min-height: 49px;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: #fffdf9;
            color: var(--text);
            font-size: 13px;
            transition: 0.2s ease;
        }

        .form-control::placeholder {
            color: #b4a18d;
        }

        .form-control:focus {
            border-color: var(--gold);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(213, 166, 91, 0.18);
        }

        .form-group {
            margin-bottom: 21px;
        }

        /* Password */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-control {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: var(--muted);
            cursor: pointer;
        }

        .toggle-password:hover {
            color: var(--gold);
        }

        .password-hint {
            display: block;
            margin-top: 8px;
            color: var(--muted);
            font-size: 11px;
        }

        #passwordMessage {
            display: block;
            margin-top: 7px;
            font-size: 12px;
        }

        /* Password Strength */

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
            transition: background 0.2s;
        }

        #strengthText {
            margin-top: 6px;
            color: var(--muted);
            font-size: 11px;
        }

        /* Submit Button */

        .create-admin-btn {
            width: 100%;
            min-height: 51px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: none;
            border-radius: 9px;
            background: var(--wood);
            color: var(--cream);
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .create-admin-btn:hover {
            background: var(--wood-light);
            box-shadow: 0 5px 15px rgba(67, 39, 25, 0.2);
            transform: translateY(-2px);
        }

        .create-admin-btn:active {
            transform: translateY(0);
        }

        /* Messages */

        #formMessage {
            display: none;
            margin-top: 18px;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 12px;
            line-height: 1.7;
        }

        #formMessage.error {
            display: block;
            color: #842029;
            background: #f8dfe1;
        }

        #formMessage.success {
            display: block;
            color: #146c43;
            background: #d9f0e3;
        }

        .security-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 24px;
            padding: 14px;
            border: 1px solid #eee2d0;
            border-radius: 9px;
            background: #fffaf2;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .security-note i {
            margin-top: 3px;
            color: #b88a42;
        }

        /* Responsive */

        @media (max-width: 576px) {
            .page-container {
                padding: 25px 12px;
            }

            .card-header-custom {
                padding: 23px 20px;
                gap: 13px;
            }

            .header-icon {
                width: 48px;
                height: 48px;
                font-size: 20px;
            }

            .card-header-custom h1 {
                font-size: 20px;
            }

            .card-header-custom p {
                font-size: 11px;
            }

            .card-body-custom {
                padding: 24px 20px;
            }

            .form-row>div {
                margin-bottom: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="#" class="navbar-brand">
                Bookish<span>.</span>
            </a>

            <div class="admin-label">
                <i class="fa-solid fa-shield-halved me-2"></i>
                Admin Panel
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="page-container">

        <section class="admin-card">

            <!-- Header -->
            <div class="card-header-custom">
                <div class="header-icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>

                <div>
                    <h1>Add New Admin</h1>
                    <p>Create a new administrator account</p>
                </div>
            </div>

            <!-- Form -->
            <div class="card-body-custom">

                <div class="section-title">
                    <i class="fa-solid fa-id-card"></i>
                    Administrator Information
                </div>

                <form id="addAdminForm" method="post" action="{{ route('Admin.store') }}">
                    @csrf
                    <!-- First and Last Name -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="first_name" class="form-label">
                                    Full Name*
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="first_name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Enter Your Name"
                                    autocomplete="given-name">
                                @error('name')
                                <p class="validation-error text-danger mt-2">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email Address *
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="admin@example.com"
                            autocomplete="email">
                        @error('email')
                        <p class="validation-error text-danger mt-2">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone" class="form-label">
                            Phone Number
                        </label>

                        <input
                            type="tel"
                            class="form-control"
                            id="phone"
                            name="phone_number"
                            value="{{ old('phone_number') }}"
                            placeholder="+20 1XX XXX XXXX"
                            autocomplete="tel"
                            minlength="11">
                        @error('phone_number')
                        <p class="validation-error text-danger mt-2">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            Password *
                        </label>

                        <div class="password-wrapper">
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Create a strong password"
                                autocomplete="new-password"
                                minlength="8">
                            @error('password')
                            <p class="validation-error text-danger mt-2">
                                {{ $message }}
                            </p>
                            @enderror

                            <button
                                type="button"
                                class="toggle-password"
                                data-target="password"
                                aria-label="Show password">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>

                        <div class="strength-bars">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div id="strengthText">
                            Password strength
                        </div>

                        <small class="password-hint">
                            Use at least 8 characters with letters and numbers.
                        </small>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="confirm_password" class="form-label">
                            Confirm Password *
                        </label>

                        <div class="password-wrapper">
                            <input
                                type="password"
                                class="form-control"
                                id="confirm_password"
                                name="password_confirmation"
                                placeholder="Enter password again"
                                autocomplete="new-password">

                            <button
                                type="button"
                                class="toggle-password"
                                data-target="confirm_password"
                                aria-label="Show password">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </div>

                        <small id="passwordMessage"></small>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="create-admin-btn">
                        <i class="fa-solid fa-user-plus"></i>
                        Create Admin Account
                    </button>

                    <!-- Feedback -->
                    <div id="formMessage" role="status" aria-live="polite"></div>

                    <!-- Security Notice -->
                    <div class="security-note">
                        <i class="fa-solid fa-lock"></i>

                        <div>
                            <strong>Security Notice</strong><br>
                            Only authorized administrators should be able to
                            create new admin accounts.
                        </div>
                    </div>

                </form>
            </div>
        </section>

    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const form = document.getElementById('addAdminForm');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');

        const passwordMessage = document.getElementById('passwordMessage');
        const formMessage = document.getElementById('formMessage');
        const strengthText = document.getElementById('strengthText');
        const strengthBars = document.querySelectorAll('.strength-bars span');

        // Show or hide password
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const input = document.getElementById(this.dataset.target);
                const icon = this.querySelector('i');

                const showPassword = input.type === 'password';

                input.type = showPassword ? 'text' : 'password';

                icon.classList.toggle('fa-eye', !showPassword);
                icon.classList.toggle('fa-eye-slash', showPassword);

                this.setAttribute(
                    'aria-label',
                    showPassword ? 'Hide password' : 'Show password'
                );
            });
        });

        // Password strength indicator
        password.addEventListener('input', function() {
            const value = password.value;
            let score = 0;

            if (value.length >= 8) score++;
            if (/[a-z]/.test(value) && /[A-Z]/.test(value)) score++;
            if (/[0-9]/.test(value)) score++;
            if (/[^a-zA-Z0-9]/.test(value)) score++;

            const colors = ['#e8dfd3', '#dc3545', '#f0ad4e', '#198754'];

            strengthBars.forEach((bar, index) => {
                bar.style.background =
                    index < score ? colors[score] : '#e8dfd3';
            });

            const labels = [
                'Password strength',
                'Weak password',
                'Fair password',
                'Strong password',
                'Very strong password'
            ];

            strengthText.textContent = labels[score];
            checkPasswords();
        });

        // Confirm password validation
        function checkPasswords() {
            if (!confirmPassword.value) {
                passwordMessage.textContent = '';
                confirmPassword.setCustomValidity('');
                return true;
            }

            if (password.value !== confirmPassword.value) {
                passwordMessage.textContent = 'Passwords do not match.';
                passwordMessage.style.color = '#b02a37';

                confirmPassword.setCustomValidity(
                    'Passwords do not match.'
                );

                return false;
            }

            passwordMessage.textContent = 'Passwords match.';
            passwordMessage.style.color = '#198754';
            confirmPassword.setCustomValidity('');

            return true;
        }

        confirmPassword.addEventListener('input', checkPasswords);

        // Form validation
        form.addEventListener('submit', function(event) {
            formMessage.className = '';
            formMessage.textContent = '';

            if (!form.checkValidity()) {
                event.preventDefault();
                form.reportValidity();
                return;
            }

            if (!checkPasswords()) {
                event.preventDefault();
                confirmPassword.reportValidity();
                return;
            }
        });
       document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('focus', function () {
        const error = this.closest('.form-group')
            ?.querySelector('.validation-error');

        if (error) {
            error.remove();
        }
    });
});
    </script>

</body>

</html>
