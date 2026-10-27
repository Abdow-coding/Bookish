<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Bookish')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/Elegant Brown B Book Logo Icon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bookish-theme.css') }}">

    <style>
        :root {
            --wood-dark: #2f1b10;
            --wood-brown: #432719;
            --wood: #68432e;
            --wood-light: #916744;
            --gold: #c79a46;
            --gold-light: #e8c777;
            --cream: #f7f0e5;
            --paper: #fffaf2;
            --text: #35251d;
            --muted: #796b60;
            --border: #e7d8c5;
        }

        /* =========================
           NAVBAR
        ========================= */

        .custom-navbar {
            background: linear-gradient(110deg, var(--wood-dark), var(--wood-brown)) !important;
            padding: 17px 0 !important;
            border-bottom: 1px solid rgba(199, 154, 70, .35);
            box-shadow: 0 5px 22px rgba(47, 27, 16, .12);
            position: relative;
            z-index: 1000;
        }

        .custom-navbar .container {
            position: relative;
        }

        .custom-navbar .navbar-brand {
            color: var(--paper) !important;
            font-family: Georgia, "Times New Roman", serif;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -.8px;
            padding: 0;
            margin-right: 45px;
            transition: color .25s ease;
        }

        .custom-navbar .navbar-brand span {
            color: var(--gold-light);
        }

        .custom-navbar .navbar-brand:hover {
            color: var(--gold-light) !important;
        }

        .custom-navbar .navbar-collapse {
            align-items: center;
        }

        .custom-navbar .custom-navbar-nav {
            gap: 7px;
            align-items: center;
        }

        .custom-navbar .custom-navbar-nav .nav-link {
            position: relative;
            color: rgba(255, 250, 242, .82) !important;
            font-size: 14px;
            font-weight: 600;
            padding: 12px 13px !important;
            transition: color .25s ease;
        }

        .custom-navbar .custom-navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 13px;
            right: 13px;
            bottom: 5px;
            height: 2px;
            background: var(--gold-light);
            transform: scaleX(0);
            transform-origin: center;
            transition: transform .25s ease;
            border-radius: 2px;
        }

        .custom-navbar .custom-navbar-nav .nav-link:hover,
        .custom-navbar .custom-navbar-nav .nav-item.active > .nav-link {
            color: var(--gold-light) !important;
        }

        .custom-navbar .custom-navbar-nav .nav-link:hover::after,
        .custom-navbar .custom-navbar-nav .nav-item.active > .nav-link::after {
            transform: scaleX(1);
        }

        .custom-navbar .custom-navbar-cta {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: 25px !important;
        }

        .custom-navbar .custom-navbar-cta > li > .nav-link,
        .custom-navbar .user-dropdown-toggle {
            width: 43px;
            height: 43px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0 !important;
            border: 1px solid rgba(232, 199, 119, .28);
            border-radius: 50%;
            background: rgba(255, 250, 242, .06);
            transition: background .25s ease, border-color .25s ease, transform .25s ease;
        }

        .custom-navbar .custom-navbar-cta > li > .nav-link:hover,
        .custom-navbar .user-dropdown-toggle:hover,
        .custom-navbar .user-dropdown-toggle:focus {
            background: rgba(199, 154, 70, .18);
            border-color: var(--gold);
            transform: translateY(-2px);
            color: var(--gold-light) !important;
        }

        .custom-navbar .custom-navbar-cta img {
            width: 21px;
            height: 21px;
            filter: brightness(0) saturate(100%) invert(85%) sepia(25%)
                    saturate(627%) hue-rotate(343deg) brightness(101%) contrast(92%);
        }

        .custom-navbar .navbar-toggler {
            border: 1px solid rgba(232, 199, 119, .4);
            border-radius: 8px;
            padding: 7px 10px;
            box-shadow: none;
        }

        .custom-navbar .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(199, 154, 70, .18);
        }

        .custom-navbar .navbar-toggler-icon {
            filter: sepia(1) saturate(2) brightness(1.5);
        }

        /* User dropdown */

        .user-dropdown {
            position: relative;
        }

        .user-dropdown-toggle {
            color: var(--gold-light) !important;
            font-size: 17px;
            text-decoration: none;
        }

        .user-dropdown-toggle::after {
            display: none;
        }

        .user-dropdown-menu {
            min-width: 225px;
            margin-top: 14px !important;
            padding: 9px;
            background: var(--paper);
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(47, 27, 16, .18);
        }

        .user-dropdown-menu .dropdown-header {
            color: var(--wood-brown);
            font-weight: 700;
            padding: 12px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 5px;
        }

        .user-dropdown-menu .dropdown-item {
            color: var(--wood-brown);
            font-size: 14px;
            padding: 11px 12px;
            border-radius: 7px;
            transition: background .2s ease, color .2s ease;
        }

        .user-dropdown-menu .dropdown-item:hover,
        .user-dropdown-menu .dropdown-item:focus {
            background: var(--cream);
            color: #8b5d23;
        }

        .user-dropdown-menu .dropdown-divider {
            border-color: var(--border);
        }

        .user-dropdown-menu .logout-item {
            width: 100%;
            text-align: left;
            border: 0;
            background: transparent;
            color: #a83232;
        }

        .user-dropdown-menu .logout-item:hover {
            background: #fbe9e6;
            color: #922626;
        }

        /* Cart counter */

        .custom-navbar .custom-navbar-cta > li > .nav-link:has(#navbar-cart) {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -4px;
            right: -4px;
            min-width: 19px;
            height: 19px;
            padding: 0 5px;
            border: 2px solid var(--wood-dark);
            border-radius: 20px;
            background: var(--gold-light);
            color: var(--wood-dark);
            font-size: 10px;
            font-weight: 800;
            line-height: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer-section {
            position: relative;
            overflow: hidden;
            padding: 75px 0 25px;
            background:
                radial-gradient(ellipse at 90% 0%, rgba(199, 154, 70, .12), transparent 32%),
                linear-gradient(125deg, #2f1b10 0%, #432719 58%, #352014 100%);
            color: rgba(255, 250, 242, .72);
            border-top: 3px solid var(--gold);
        }

        .footer-section::before {
            content: "";
            position: absolute;
            top: -190px;
            right: -100px;
            width: 430px;
            height: 430px;
            border: 1px solid rgba(232, 199, 119, .12);
            border-radius: 50%;
            pointer-events: none;
        }

        .footer-section .container {
            position: relative;
            z-index: 1;
        }

        .footer-section .subscription-form {
            padding: 27px 30px;
            margin-bottom: 65px;
            border: 1px solid rgba(232, 199, 119, .25);
            border-radius: 16px;
            background: rgba(255, 250, 242, .045);
        }

        .footer-section .subscription-form h3 {
            color: var(--paper);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 23px;
            font-weight: 700;
            margin-bottom: 20px;
            gap: 10px;
        }

        .footer-section .subscription-form h3 img {
            width: 27px;
            height: 27px;
            filter: brightness(0) saturate(100%) invert(80%) sepia(32%)
                    saturate(727%) hue-rotate(343deg) brightness(101%) contrast(91%);
        }

        .footer-section .subscription-form form {
            align-items: stretch;
        }

        .footer-section .subscription-form .form-control {
            min-height: 48px;
            min-width: 190px;
            padding: 12px 15px;
            color: var(--paper);
            background: rgba(255, 250, 242, .08);
            border: 1px solid rgba(232, 199, 119, .25);
            border-radius: 8px;
            box-shadow: none;
            transition: border-color .2s ease, background .2s ease;
        }

        .footer-section .subscription-form .form-control::placeholder {
            color: rgba(255, 250, 242, .55);
        }

        .footer-section .subscription-form .form-control:focus {
            background: rgba(255, 250, 242, .12);
            border-color: var(--gold-light);
            box-shadow: 0 0 0 3px rgba(199, 154, 70, .12);
        }

        .footer-section .subscription-form .btn-primary {
            min-height: 48px;
            min-width: 50px;
            border: 1px solid var(--gold);
            border-radius: 8px;
            background: var(--gold);
            color: var(--wood-dark);
            transition: background .2s ease, transform .2s ease;
        }

        .footer-section .subscription-form .btn-primary:hover {
            background: var(--gold-light);
            border-color: var(--gold-light);
            transform: translateY(-2px);
        }

        .footer-section .footer-logo {
            display: inline-block;
            margin-bottom: 12px;
            color: var(--paper);
            font-family: Georgia, "Times New Roman", serif;
            font-size: 34px;
            font-weight: 700;
            letter-spacing: -.7px;
            text-decoration: none;
        }

        .footer-section .footer-logo span {
            color: var(--gold-light);
        }

        .footer-section p {
            color: rgba(255, 250, 242, .68);
            font-size: 14px;
            line-height: 1.9;
        }

        .footer-section .custom-social {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 24px;
        }

        .footer-section .custom-social li a {
            width: 39px;
            height: 39px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid rgba(232, 199, 119, .25);
            border-radius: 50%;
            background: rgba(255, 250, 242, .06);
            color: var(--gold-light);
            text-decoration: none;
            transition: background .25s ease, color .25s ease, transform .25s ease;
        }

        .footer-section .custom-social li a:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--wood-dark);
            transform: translateY(-3px);
        }

        .footer-section .links-wrap {
            row-gap: 25px;
            padding-top: 10px;
        }

        .footer-section .links-wrap ul {
            margin: 0;
        }

        .footer-section .links-wrap li {
            margin-bottom: 15px;
        }

        .footer-section .links-wrap a,
        .footer-section .copyright a {
            color: rgba(255, 250, 242, .7);
            font-size: 14px;
            text-decoration: none;
            transition: color .2s ease;
        }

        .footer-section .links-wrap a:hover,
        .footer-section .copyright a:hover {
            color: var(--gold-light);
        }

        .footer-section .copyright {
            margin-top: 35px;
            border-color: rgba(232, 199, 119, .2) !important;
        }

        .footer-section .copyright p {
            font-size: 13px;
            margin-bottom: 0;
        }

        .footer-section .copyright ul {
            flex-wrap: wrap;
            gap: 12px;
            justify-content: center;
            margin-bottom: 0;
        }

        .footer-section .copyright ul li {
            margin-right: 0 !important;
        }

        .footer-section .copyright a {
            font-size: 13px;
        }

        /* Flying book animation */

        .flying-book {
            position: fixed;
            z-index: 99999;
            width: 40px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
            pointer-events: none;
            transition:
                left .7s cubic-bezier(.5, -.3, .8, .5),
                top .7s cubic-bezier(.5, -.3, .8, .5),
                width .7s ease,
                height .7s ease,
                opacity .7s ease,
                transform .7s ease;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991.98px) {
            .custom-navbar .navbar-brand {
                margin-right: 20px;
            }

            .custom-navbar .custom-navbar-nav {
                gap: 0;
            }

            .custom-navbar .custom-navbar-nav .nav-link {
                padding: 11px 10px !important;
            }

            .custom-navbar .custom-navbar-cta {
                margin-left: 10px !important;
            }

            .footer-section {
                padding-top: 55px;
            }

            .footer-section .subscription-form {
                margin-bottom: 45px;
            }
        }

        @media (max-width: 767.98px) {
            .custom-navbar {
                padding: 13px 0 !important;
            }

            .custom-navbar .navbar-brand {
                font-size: 29px;
                margin-right: 0;
            }

            .custom-navbar .navbar-collapse {
                margin-top: 18px;
                padding: 12px 15px 17px;
                border: 1px solid rgba(232, 199, 119, .2);
                border-radius: 12px;
                background: rgba(30, 17, 10, .45);
            }

            .custom-navbar .custom-navbar-nav {
                align-items: stretch;
            }

            .custom-navbar .custom-navbar-nav .nav-link {
                padding: 12px 8px !important;
            }

            .custom-navbar .custom-navbar-nav .nav-link::after {
                display: none;
            }

            .custom-navbar .custom-navbar-nav .nav-item.active > .nav-link {
                background: rgba(199, 154, 70, .12);
                border-radius: 7px;
            }

            .custom-navbar .custom-navbar-cta {
                flex-direction: row;
                justify-content: flex-start;
                margin: 14px 0 0 !important;
                padding-top: 14px;
                border-top: 1px solid rgba(232, 199, 119, .2);
            }

            .user-dropdown-menu {
                margin-top: 8px !important;
            }

            .footer-section {
                padding: 45px 0 20px;
            }

            .footer-section .subscription-form {
                padding: 22px 18px;
                margin-bottom: 40px;
            }

            .footer-section .subscription-form h3 {
                font-size: 21px;
                align-items: flex-start !important;
            }

            .footer-section .subscription-form form {
                flex-direction: column;
            }

            .footer-section .subscription-form form .col-auto {
                width: 100%;
            }

            .footer-section .subscription-form .form-control {
                width: 100%;
                min-width: 0;
            }

            .footer-section .subscription-form .btn-primary {
                width: 100%;
            }

            .footer-section .links-wrap {
                padding-top: 15px;
            }

            .footer-section .copyright {
                margin-top: 20px;
            }

            .footer-section .copyright .row {
                row-gap: 15px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .custom-navbar *,
            .footer-section * {
                transition: none !important;
            }
        }
    </style>
</head>

<body>

    @guest
    <header>
        <nav class="custom-navbar navbar navbar-expand-md navbar-dark" aria-label="Bookish navigation bar">
            <div class="container">

                <a class="navbar-brand" href="{{ route('Home') }}">Bookish<span>.</span></a>

                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarsFurni"
                    aria-controls="navbarsFurni"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsFurni">

                    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item {{ request()->routeIs('Home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('Home') }}">Home</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('shop') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('shop') }}#shop">Shop</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('sell') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('sell') }}">Sell</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('blog') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blog') }}#blog">Blog</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>

                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0">
                        <li>
                            <a class="nav-link" href="{{ route('login') }}" aria-label="Login">
                                <img src="{{ asset('assets/images/user.svg') }}" alt="User">
                            </a>
                        </li>

                        <li>
                            <a class="nav-link" href="{{ route('cart.index') }}" aria-label="Cart">
                                <img src="{{ asset('assets/images/cart.svg') }}" alt="Cart">
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    @endguest

    @auth
    <header>
        <nav class="custom-navbar navbar navbar-expand-md navbar-dark" aria-label="Bookish navigation bar">
            <div class="container">

                <a class="navbar-brand" href="{{ route('Home') }}">Bookish<span>.</span></a>

                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarsFurni"
                    aria-controls="navbarsFurni"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsFurni">

                    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item {{ request()->routeIs('Home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('Home') }}">Home</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('shop') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('shop') }}#shop">Shop</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('sell') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('sell') }}">Sell</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('blog') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blog') }}#blog">Blog</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>

                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0">

                        <li>
                            <a class="nav-link" href="{{ route('cart.index') }}" aria-label="Cart">
                                <img src="{{ asset('assets/images/cart.svg') }}" id="navbar-cart" alt="Cart">

                                <span id="cart-count" class="cart-count">
                                    {{ auth()->check() ? \App\Models\Cart::where('user_id', auth()->id())->sum('quantity') : 0 }}
                                </span>
                            </a>
                        </li>

                        <li class="nav-item dropdown user-dropdown">
                            <a class="nav-link dropdown-toggle user-dropdown-toggle"
                                href="#"
                                id="userDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                aria-label="User menu">
                                <i class="fa-solid fa-user"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu"
                                aria-labelledby="userDropdown">

                                <li class="dropdown-header">
                                    {{ Auth::user()->first_name ?? Auth::user()->name ?? 'My Account' }}
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('Home') }}">
                                        <i class="fa-solid fa-house me-2"></i>
                                        Home
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('my.orders') }}">
                                        <i class="fa-solid fa-box me-2"></i>
                                        My Orders
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('myListings') }}">
                                        <i class="fa-solid fa-book me-2"></i>
                                        My Books
                                    </a>
                                </li>

                                @if(Auth::user()->role === 'admin')
                                <li>
                                    <a class="dropdown-item" href="{{ route('Admin.Users') }}">
                                        <i class="fa-solid fa-gauge-high me-2"></i>
                                        Admin Dashboard
                                    </a>
                                </li>
                                @endif

                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item logout-item">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @endauth

    @yield('content')

    <footer class="footer-section">
        <div class="container relative">

            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center">
                            <span class="me-1">
                                <img src="{{ asset('assets/images/envelope-outline.svg') }}" alt="Newsletter" class="img-fluid">
                            </span>
                            <span>Subscribe to Newsletter</span>
                        </h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name" aria-label="Your name">
                            </div>

                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email" aria-label="Your email">
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary" aria-label="Subscribe">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">

                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap">
                        <a href="{{ route('Home') }}" class="footer-logo">Bookish<span>.</span></a>
                    </div>

                    <p class="mb-4">
                        Bookish is a downtown Cairo bookshop for new and second-hand books.
                        Every used copy is photographed and described by condition, so you know
                        exactly what you're getting, and we deliver across Egypt.
                    </p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#" aria-label="Facebook"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#" aria-label="Twitter"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#" aria-label="Instagram"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#" aria-label="LinkedIn"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('Home') }}">Home</a></li>
                                <li><a href="{{ route('shop') }}#shop">Shop Books</a></li>
                                <li><a href="{{ route('sell') }}">Sell a Book</a></li>
                                <li><a href="{{ route('blog') }}#blog">Blog</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('contact') }}">Customer Support</a></li>
                                <li><a href="{{ route('contact') }}">Get in Touch</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Our Story</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4 align-items-center">

                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script>.
                            All Rights Reserved. &mdash; Designed with love by
                            <a href="https://portfolio-cv.infinityfreeapp.com/Portfolio/Views/index"
                                target="_blank" rel="noopener noreferrer">Abdelrahman</a>
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>

