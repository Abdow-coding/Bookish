
@extends('layout')

@section('title', 'Contact Us')

@section('content')

<style>
:root {
    --book-brown: #432719;
    --book-gold: #b8894e;
    --book-cream: #fffaf2;
    --book-muted: #8b7868;
    --book-border: #eadfce;
}

/* =========================
   Contact Hero - Sell Theme
========================= */
.hero.contact-hero {
    position: relative;
    isolation: isolate;
    display: block;
    overflow: hidden;
    min-height: 345px;
    padding: 55px 0 45px !important;

    background:
        radial-gradient(
            ellipse at 82% 50%,
            rgba(213, 170, 99, .18),
            transparent 35%
        ),
        linear-gradient(
            110deg,
            #fff8eb 0%,
            #f5e6cf 57%,
            #e9d1a9 100%
        ) !important;

    background-color: #f5e6cf !important;
    border-bottom: 1px solid rgba(184, 137, 78, .35);
    box-shadow: none !important;
}

.hero.contact-hero::before {
    position: absolute;
    z-index: -1;
    top: -150px;
    right: -80px;
    width: 510px;
    height: 510px;
    border: 1px solid rgba(184, 137, 78, .35);
    border-radius: 50%;
    content: "";
    pointer-events: none;
}

.hero.contact-hero::after {
    position: absolute;
    z-index: -1;
    right: -120px;
    bottom: -205px;
    width: 700px;
    height: 290px;
    border: 1px solid rgba(184, 137, 78, .45);
    border-radius: 50%;
    content: "";
    transform: rotate(-8deg);
    pointer-events: none;
}

.hero.contact-hero > .container {
    position: relative;
    z-index: 2;
}

.contact-hero .row {
    position: relative;
    z-index: 2;
}

.contact-hero .intro-excerpt {
    padding: 15px 0;
}

.contact-hero .intro-excerpt h1 {
    margin: 0 0 18px !important;
    color: #2f1b10 !important;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(40px, 5.2vw, 64px) !important;
    font-weight: 700;
    line-height: 1.1 !important;
    letter-spacing: -1.5px;
}

.contact-hero .intro-excerpt h1 span {
    color: #a8782d !important;
}

.contact-hero .intro-excerpt p {
    max-width: 490px;
    color: #60452f !important;
    font-size: 15px;
    line-height: 1.9;
}

/* Hero Image */
.contact-hero .hero-img-wrap {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 245px;
    padding: 0;
    background: transparent !important;
}

.contact-hero .hero-img-wrap img {
    position: relative;
    z-index: 2;
    display: block;
    width: 100%;
    max-width: 410px;
    max-height: 300px;
    object-fit: contain;
    filter: drop-shadow(0 18px 20px rgba(47, 27, 16, .2));
    transition: transform .35s ease;
}

.contact-hero .hero-img-wrap img:hover {
    transform: translateY(-6px) rotate(-1deg);
}

/* Hero Buttons */
.contact-hero .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 13px 23px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: all .25s ease;
}

.contact-hero .btn-secondary {
    border: 1px solid #a8782d !important;
    background: linear-gradient(
        110deg,
        #80521c,
        #c69a4e 55%,
        #a8782d
    ) !important;
    color: #fffaf2 !important;
}

.contact-hero .btn-secondary:hover {
    transform: translateY(-2px);
    filter: brightness(1.05);
    box-shadow: 0 7px 16px rgba(125, 81, 28, .2);
}

.contact-hero .btn-white-outline {
    border: 1px solid #b8894e !important;
    background: rgba(255, 250, 242, .4) !important;
    color: #68432e !important;
}

.contact-hero .btn-white-outline:hover {
    background: #432719 !important;
    color: #fffaf2 !important;
}

/* =========================
   Main Contact Section
========================= */
.contact-section {
    padding: 75px 0 90px;
    background: #fffdf9;
}

.contact-heading {
    margin-bottom: 38px;
    text-align: center;
}

.contact-heading .eyebrow {
    display: inline-block;
    margin-bottom: 10px;
    color: var(--book-gold);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
}

.contact-heading h2 {
    margin-bottom: 12px;
    color: var(--book-brown);
    font-size: clamp(27px, 3vw, 37px);
    font-weight: 800;
}

.contact-heading p {
    max-width: 560px;
    margin: 0 auto;
    color: var(--book-muted);
    font-size: 14px;
    line-height: 1.8;
}

/* Contact Information Cards */
.contact-info-row {
    margin-bottom: 38px;
}

.contact-info-card {
    display: flex;
    align-items: center;
    gap: 15px;
    height: 100%;
    min-height: 112px;
    padding: 22px 18px;
    border: 1px solid var(--book-border);
    border-radius: 17px;
    background: #fff;
    box-shadow: 0 7px 24px rgba(67, 39, 25, .045);
    transition: transform .25s ease, box-shadow .25s ease;
}

.contact-info-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 30px rgba(67, 39, 25, .09);
}

.contact-info-icon {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    width: 49px;
    height: 49px;
    border-radius: 14px;
    background: #f6eddf;
    color: var(--book-brown);
    font-size: 19px;
}

.contact-info-content {
    min-width: 0;
}

.contact-info-content h5 {
    margin-bottom: 7px;
    color: var(--book-brown);
    font-size: 14px;
    font-weight: 800;
}

.contact-info-content p {
    margin: 0;
    color: var(--book-muted);
    font-size: 12px;
    line-height: 1.7;
    overflow-wrap: anywhere;
}

/* Contact Form Card */
.contact-form-card {
    padding: 35px;
    border: 1px solid var(--book-border);
    border-radius: 22px;
    background: #fff;
    box-shadow: 0 12px 38px rgba(67, 39, 25, .06);
}

.contact-form-heading {
    margin-bottom: 28px;
}

.contact-form-heading h3 {
    margin-bottom: 9px;
    color: var(--book-brown);
    font-size: 23px;
    font-weight: 800;
}

.contact-form-heading p {
    margin: 0;
    color: var(--book-muted);
    font-size: 13px;
    line-height: 1.7;
}

.contact-form-card .form-group {
    margin-bottom: 22px;
}

.contact-form-card label {
    display: block;
    margin-bottom: 9px;
    color: var(--book-brown);
    font-size: 13px;
    font-weight: 700;
}

.contact-form-card .form-control {
    display: block;
    width: 100%;
    min-height: 49px;
    padding: 12px 15px;
    border: 1px solid var(--book-border);
    border-radius: 11px;
    background: var(--book-cream);
    color: var(--book-brown);
    font-family: inherit;
    font-size: 13px;
    box-shadow: none;
    transition: border-color .25s ease, box-shadow .25s ease;
}

.contact-form-card .form-control::placeholder {
    color: #aa9a88;
}

.contact-form-card .form-control:focus {
    border-color: var(--book-gold);
    background: #fff;
    box-shadow: 0 0 0 4px rgba(184, 137, 78, .12);
    outline: none;
}

.contact-form-card textarea.form-control {
    min-height: 150px;
    resize: vertical;
}

.contact-submit-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 49px;
    padding: 13px 24px;
    border: 1px solid var(--book-brown);
    border-radius: 11px;
    background: var(--book-brown);
    color: var(--book-cream);
    font-family: inherit;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: background .25s ease, transform .25s ease;
}

.contact-submit-btn:hover {
    transform: translateY(-2px);
    border-color: var(--book-gold);
    background: var(--book-gold);
    color: #fff;
}

/* =========================
   Responsive
========================= */
@media (max-width: 991px) {
    .contact-hero .hero-img-wrap img {
        max-width: 320px;
        max-height: 300px;
    }

    .contact-section {
        padding: 55px 0 70px;
    }
}

@media (max-width: 767px) {
    .hero.contact-hero {
        min-height: auto;
        padding: 35px 0 25px !important;
    }

    .contact-hero .intro-excerpt {
        padding-top: 10px;
    }

    .contact-hero .intro-excerpt h1 {
        font-size: clamp(38px, 9vw, 54px) !important;
    }

    .contact-hero .intro-excerpt p {
        font-size: 14px;
    }

    .contact-hero .hero-img-wrap {
        min-height: 175px;
        padding: 10px 0 15px;
    }

    .contact-hero .hero-img-wrap img {
        max-width: 260px;
        max-height: 230px;
    }

    .contact-info-row {
        row-gap: 14px;
        margin-bottom: 28px;
    }

    .contact-info-card {
        min-height: 95px;
        padding: 17px;
    }

    .contact-form-card {
        padding: 24px 18px;
        border-radius: 17px;
    }

    .contact-form-heading h3 {
        font-size: 21px;
    }
}

@media (max-width: 420px) {
    .contact-hero .btn {
        padding: 11px 15px;
        font-size: 12px;
    }

    .contact-form-card {
        padding: 21px 15px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .contact-hero .hero-img-wrap img,
    .contact-info-card,
    .contact-submit-btn,
    .contact-form-card .form-control {
        transition: none !important;
    }
}
</style>

<!-- Hero Section -->
<div class="hero contact-hero">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Let's Talk <span>Books</span></h1>

                    <p class="mb-4">
                        Every great story begins with a connection.
                        Whether you need assistance, have a suggestion,
                        or simply want to talk books, we'd love to hear from you.
                    </p>

                    <p>
                        <a href="{{ route('shop') }}#shop"
                           class="btn btn-secondary me-2">
                            Shop Now
                        </a>

                        <a href="{{ route('Home') }}"
                           class="btn btn-white-outline">
                            Explore
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img
                        src="{{ asset('assets/images/book_3d_pride_and_prejudice.png') }}"
                        class="img-fluid"
                        alt="Pride and Prejudice book"
                        loading="lazy"
                    >
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">

        <div class="contact-heading">
            <span class="eyebrow">GET IN TOUCH</span>

            <h2>We'd Love to Hear from You</h2>

            <p>
                Have a question about a book or need help with your order?
                Reach out to us using the information below or send us a message.
            </p>
        </div>

        <!-- Contact Information -->
        <div class="row contact-info-row">

            <div class="col-md-4 mb-3 mb-md-0">
                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <div class="contact-info-content">
                        <h5>Our Location</h5>
                        <p>43 Raymouth Rd. Baltemoer, London 3910</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3 mb-md-0">
                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="contact-info-content">
                        <h5>Email Us</h5>
                        <p>info@yourdomain.com</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <div class="contact-info-content">
                        <h5>Call Us</h5>
                        <p>+1 294 3925 3939</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Contact Form -->
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">

                <div class="contact-form-card">

                    <div class="contact-form-heading">
                        <h3>Send Us a Message</h3>

                        <p>
                            Fill in the form below and let us know how we can help.
                        </p>
                    </div>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('contact.send') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="fname">First Name</label>

                <input
                    type="text"
                    name="first_name"
                    class="form-control"
                    id="fname"
                    placeholder="Enter your first name"
                    value="{{ old('first_name') }}"
                    maxlength="100"
                    required
                >

                @error('first_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="lname">Last Name</label>

                <input
                    type="text"
                    name="last_name"
                    class="form-control"
                    id="lname"
                    placeholder="Enter your last name"
                    value="{{ old('last_name') }}"
                    maxlength="100"
                    required
                >

                @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>

        <input
            type="email"
            name="email"
            class="form-control"
            id="email"
            placeholder="name@example.com"
            value="{{ old('email') }}"
            maxlength="255"
            required
        >

        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="message">Your Message</label>

        <textarea
            name="message"
            class="form-control"
            id="message"
            rows="5"
            maxlength="5000"
            placeholder="Write your message here..."
            required
        >{{ old('message') }}</textarea>

        @error('message')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="contact-submit-btn">
        <i class="fa-regular fa-paper-plane"></i>
        Send Message
    </button>
</form>


                </div>

            </div>
        </div>

    </div>
</section>
<!-- End Contact Section -->

@endsection
