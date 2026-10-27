@extends('layout')

@section('title', 'One Product')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .bookish-product {
        --wood: #432719;
        --wood-dark: #301b12;
        --wood-light: #70452f;
        --gold: #d5a65b;
        --gold-light: #e6c58c;
        --cream: #fffaf2;
        --paper: #fffdf9;
        --text: #493528;
        --muted: #8b7868;
        --border: #eadbc6;
        --danger: #93432f;

        background: var(--cream);
        color: var(--text);
        overflow: hidden;
    }

    .bookish-product *,
    .bookish-product *::before,
    .bookish-product *::after {
        box-sizing: border-box;
    }

    .bookish-product a {
        text-decoration: none;
    }

    /* =========================
       Luxury Product Hero
    ========================= */

    .bookish-product .product-hero {
        position: relative;
        overflow: hidden;
        padding: 76px 0 80px;
        background:
            radial-gradient(
                circle at 83% 22%,
                rgba(213, 166, 91, .13),
                transparent 28%
            ),
            linear-gradient(
                120deg,
                var(--wood-dark) 0%,
                var(--wood) 55%,
                #583822 100%
            );
    }

    .bookish-product .product-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        opacity: .13;
        background: repeating-linear-gradient(
            0deg,
            transparent 0,
            transparent 34px,
            rgba(255, 250, 242, .15) 35px,
            transparent 37px
        );
    }

    .bookish-product .product-hero .container {
        position: relative;
        z-index: 1;
    }

    .bookish-product .product-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--gold);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    .bookish-product .product-eyebrow::before {
        content: "";
        width: 30px;
        height: 2px;
        background: var(--gold);
    }

    .bookish-product .product-hero h1 {
        max-width: 720px;
        color: var(--cream);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(35px, 4.5vw, 56px);
        font-weight: 700;
        line-height: 1.2;
        overflow-wrap: anywhere;
        margin: 0 0 20px;
    }

    .bookish-product .product-hero h1 span {
        color: var(--gold);
    }

    .bookish-product .product-hero-description {
        max-width: 560px;
        color: #e8d9c8;
        font-size: 15px;
        line-height: 1.9;
        margin-bottom: 27px;
    }

    .bookish-product .product-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        color: #d4c0aa;
        font-size: 12px;
    }

    .bookish-product .product-breadcrumb a {
        color: var(--gold-light);
        transition: color .2s ease;
    }

    .bookish-product .product-breadcrumb a:hover {
        color: white;
    }

    .bookish-product .breadcrumb-divider {
        color: #9c7955;
    }

    .bookish-product .hero-decoration {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        width: 205px;
        height: 205px;
        border: 1px solid rgba(213, 166, 91, .4);
        border-radius: 50%;
        background: rgba(255, 250, 242, .035);
        box-shadow:
            0 0 0 14px rgba(213, 166, 91, .035),
            0 0 0 28px rgba(213, 166, 91, .02);
    }

    .bookish-product .hero-decoration i {
        color: var(--gold);
        font-size: 78px;
    }

    /* =========================
       Main Product Section
    ========================= */

    .bookish-product .product-section {
        padding: 65px 0 85px;
        background:
            radial-gradient(
                ellipse at top left,
                rgba(213, 166, 91, .055),
                transparent 35%
            ),
            var(--cream);
    }

    .bookish-product .product-back-link {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        color: var(--wood-light);
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 25px;
        transition: color .2s ease;
    }

    .bookish-product .product-back-link:hover {
        color: #9a6c30;
    }

    .bookish-product .product-card {
        position: relative;
        overflow: hidden;
        padding: 42px;
        border: 1px solid var(--border);
        border-radius: 16px;
        background: var(--paper);
        box-shadow:
            0 18px 55px rgba(67, 39, 25, .07),
            0 3px 10px rgba(67, 39, 25, .025);
    }

    .bookish-product .product-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(
            90deg,
            var(--wood),
            var(--gold),
            var(--wood)
        );
    }

    /* =========================
       Book Cover
    ========================= */

    .bookish-product .product-visual-column {
        position: relative;
    }

    .bookish-product .book-visual {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 470px;
        padding: 38px;
        overflow: hidden;
        border: 1px solid #eee0cb;
        border-radius: 12px;
        background:
            radial-gradient(
                circle at center,
                #fffdf9 0%,
                #f7eddf 60%,
                #efe0ca 100%
            );
    }

    .bookish-product .book-visual::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border: 1px solid rgba(180, 132, 62, .16);
        border-radius: 50%;
    }

    .bookish-product .book-visual::after {
        content: "";
        position: absolute;
        width: 215px;
        height: 215px;
        border: 1px solid rgba(180, 132, 62, .12);
        border-radius: 50%;
    }

    .bookish-product .book-cover {
        position: relative;
        z-index: 1;
        display: block;
        width: 100%;
        max-width: 275px;
        height: 375px;
        object-fit: cover;
        border: 1px solid rgba(67, 39, 25, .12);
        border-radius: 3px 9px 9px 3px;
        background: #f3e6d4;
        box-shadow:
            12px 16px 25px rgba(48, 27, 18, .22),
            3px 3px 0 rgba(67, 39, 25, .12);
        transition: transform .35s ease, box-shadow .35s ease;
    }

    .bookish-product .book-visual:hover .book-cover {
        transform: translateY(-5px) rotate(-1deg);
        box-shadow:
            16px 22px 30px rgba(48, 27, 18, .25),
            3px 3px 0 rgba(67, 39, 25, .12);
    }

    .bookish-product .book-labels {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        margin-top: 23px;
    }

    .bookish-product .book-title-label {
        max-width: 100%;
        padding: 11px 22px;
        border: 1px solid var(--border);
        border-radius: 7px;
        background: var(--paper);
        color: var(--wood);
        font-size: 14px;
        font-weight: 800;
        text-align: center;
        overflow-wrap: anywhere;
    }

    .bookish-product .store-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #795c37;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .5px;
    }

    .bookish-product .store-label i {
        color: #7c8a56;
        font-size: 12px;
    }

    /* =========================
       Product Information
    ========================= */

    .bookish-product .book-info {
        padding: 12px 5px 12px 36px;
    }

    .bookish-product .category-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        max-width: 100%;
        padding: 8px 14px;
        margin-bottom: 20px;
        border: 1px solid #e7d4b5;
        border-radius: 5px;
        background: #f8eddb;
        color: #795528;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1.3px;
        text-transform: uppercase;
        overflow-wrap: anywhere;
    }

    .bookish-product .category-label i {
        color: #a57b3e;
    }

    .bookish-product .book-heading {
        color: var(--wood);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: clamp(32px, 3.3vw, 45px);
        font-weight: 700;
        line-height: 1.23;
        overflow-wrap: anywhere;
        margin: 0 0 15px;
    }

    .bookish-product .author {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px;
        color: var(--muted);
        font-size: 14px;
        margin-bottom: 25px;
    }

    .bookish-product .author strong {
        color: var(--wood-light);
        font-weight: 750;
    }

    .bookish-product .price-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 20px 22px;
        margin-bottom: 28px;
        border: 1px solid #e9d7b9;
        border-radius: 9px;
        background: linear-gradient(120deg, #fcf3e4, #fffaf2);
    }

    .bookish-product .price-caption {
        display: block;
        color: var(--muted);
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .bookish-product .price {
        color: var(--wood);
        font-size: 32px;
        font-weight: 800;
        line-height: 1.15;
        margin: 0;
        overflow-wrap: anywhere;
    }

    .bookish-product .price-currency {
        color: #97713d;
        font-size: 16px;
        font-weight: 700;
    }

    .bookish-product .condition-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 12px;
        border: 1px solid #e3d0b1;
        border-radius: 5px;
        background: rgba(255, 253, 249, .8);
        color: #795528;
        font-size: 11px;
        font-weight: 800;
        text-transform: capitalize;
    }

    .bookish-product .condition-badge i {
        color: #8c9a62;
        font-size: 10px;
    }

    .bookish-product .section-heading {
        color: var(--wood);
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 23px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .bookish-product .description {
        color: #796b5e;
        font-size: 14px;
        line-height: 2;
        overflow-wrap: anywhere;
        margin-bottom: 25px;
    }

    /* =========================
       Book Details
    ========================= */

    .bookish-product .details-list {
        padding: 12px 0;
        margin-bottom: 28px;
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
    }

    .bookish-product .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 18px;
        padding: 10px 0;
        font-size: 13px;
    }

    .bookish-product .detail-name {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        color: var(--muted);
        flex-shrink: 0;
    }

    .bookish-product .detail-name i {
        width: 15px;
        color: #a57b3e;
        text-align: center;
    }

    .bookish-product .detail-value {
        color: var(--wood);
        font-weight: 750;
        text-align: right;
        overflow-wrap: anywhere;
    }

    .bookish-product .stock-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #647342;
    }

    .bookish-product .stock-status::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #82975b;
    }

    .bookish-product .stock-status.out-of-stock {
        color: var(--danger);
    }

    .bookish-product .stock-status.out-of-stock::before {
        background: var(--danger);
    }

    /* =========================
       Buttons
    ========================= */

    .bookish-product .action-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .bookish-product .cart-form {
        flex: 1 1 210px;
        min-width: 0;
    }

    .bookish-product .btn-cart,
    .bookish-product .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        min-height: 53px;
        padding: 14px 22px;
        border-radius: 7px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 800;
        text-align: center;
        transition: background .25s ease,
                    color .25s ease,
                    border-color .25s ease,
                    transform .25s ease;
        cursor: pointer;
    }

    .bookish-product .btn-cart {
        width: 100%;
        border: 1px solid var(--wood);
        background: var(--wood);
        color: var(--cream);
        box-shadow: 0 5px 12px rgba(67, 39, 25, .1);
    }

    .bookish-product .btn-cart:hover:not(:disabled) {
        border-color: var(--wood-light);
        background: var(--wood-light);
        color: var(--gold-light);
        transform: translateY(-2px);
    }

    .bookish-product .btn-cart:disabled {
        opacity: .7;
        cursor: wait;
        transform: none;
    }

    .bookish-product .btn-back {
        flex: 0 0 auto;
        border: 1px solid #ddcbb1;
        background: transparent;
        color: var(--wood);
    }

    .bookish-product .btn-back:hover {
        border-color: var(--gold);
        background: #f8eddb;
        color: var(--wood);
    }

    .bookish-product .sold-out-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 53px;
        padding: 14px 20px;
        border: 1px solid #d9c8b5;
        border-radius: 7px;
        background: #e9dfd3;
        color: #8b7868;
        font-size: 12px;
        font-weight: 800;
        cursor: not-allowed;
    }

    .bookish-product .product-assurance {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
        margin-top: 22px;
        padding-top: 19px;
        border-top: 1px solid #f0e5d6;
    }

    .bookish-product .assurance-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--muted);
        font-size: 10px;
        font-weight: 700;
    }

    .bookish-product .assurance-item i {
        color: #a57b3e;
        font-size: 13px;
    }

    /* =========================
       AJAX Feedback
    ========================= */

    .bookish-product .product-alert {
        display: none;
        padding: 13px 16px;
        margin-bottom: 20px;
        border: 1px solid var(--border);
        border-radius: 7px;
        background: var(--paper);
        color: var(--wood);
        font-size: 13px;
        line-height: 1.6;
    }

    .bookish-product .product-alert.show {
        display: block;
    }

    .bookish-product .product-alert.success {
        border-color: #cbd8b9;
        background: #f3f7ec;
        color: #52653a;
    }

    .bookish-product .product-alert.error {
        border-color: #e7c8bc;
        background: #fcf0ec;
        color: var(--danger);
    }

    /* =========================
       Responsive
    ========================= */

    @media (max-width: 991px) {
        .bookish-product .product-hero {
            padding: 60px 0;
        }

        .bookish-product .product-card {
            padding: 28px;
        }

        .bookish-product .book-visual {
            min-height: 400px;
        }

        .bookish-product .book-cover {
            max-width: 240px;
            height: 330px;
        }

        .bookish-product .book-info {
            padding: 35px 4px 5px;
        }

        .bookish-product .hero-decoration {
            width: 170px;
            height: 170px;
        }

        .bookish-product .hero-decoration i {
            font-size: 62px;
        }
    }

    @media (max-width: 575px) {
        .bookish-product .product-hero {
            padding: 43px 0;
        }

        .bookish-product .product-hero h1 {
            font-size: 35px;
        }

        .bookish-product .product-hero-description {
            font-size: 13px;
        }

        .bookish-product .product-section {
            padding: 32px 0 48px;
        }

        .bookish-product .product-card {
            padding: 17px;
            border-radius: 11px;
        }

        .bookish-product .book-visual {
            min-height: 330px;
            padding: 20px;
        }

        .bookish-product .book-visual::before {
            width: 215px;
            height: 215px;
        }

        .bookish-product .book-visual::after {
            width: 175px;
            height: 175px;
        }

        .bookish-product .book-cover {
            max-width: 210px;
            height: 285px;
        }

        .bookish-product .book-info {
            padding-top: 30px;
        }

        .bookish-product .book-heading {
            font-size: 32px;
        }

        .bookish-product .price-box {
            padding: 16px;
        }

        .bookish-product .price {
            font-size: 28px;
        }

        .bookish-product .detail-row {
            gap: 10px;
            font-size: 12px;
        }

        .bookish-product .action-buttons {
            flex-direction: column;
        }

        .bookish-product .cart-form,
        .bookish-product .btn-back {
            width: 100%;
            flex-basis: auto;
        }

        .bookish-product .product-assurance {
            gap: 12px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .bookish-product *,
        .bookish-product *::before,
        .bookish-product *::after {
            transition: none !important;
            animation: none !important;
        }
    }
</style>

@php
    $p = $product;
@endphp

<div class="bookish-product">

    {{-- Product Hero --}}
    <section class="product-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <span class="product-eyebrow">THE BOOKISH COLLECTION</span>

                    <h1>
                        Every Book Has
                        <span>A Story to Tell.</span>
                    </h1>

                    <p class="product-hero-description">
                        Discover the details, explore the pages,
                        and find the book that belongs on your shelf.
                        Your next chapter begins here.
                    </p>

                    <nav class="product-breadcrumb" aria-label="Breadcrumb">
                        <a href="{{ route('Home') }}">Home</a>
                        <span class="breadcrumb-divider">/</span>
                        <a href="{{ route('shop') }}#shop">Shop</a>
                        <span class="breadcrumb-divider">/</span>
                        <span>Book Details</span>
                    </nav>
                </div>

                <div class="col-lg-3 d-none d-lg-block">
                    <div class="hero-decoration">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Product Details --}}
    <main class="product-section">
        <div class="container">

            <a href="{{ route('shop') }}" class="product-back-link">
                <i class="fa-solid fa-arrow-left"></i>
                Back to the collection
            </a>

            <div id="product-alert" class="product-alert" role="status" aria-live="polite"></div>

            <div class="product-card">
                <div class="row align-items-center g-lg-4">

                    {{-- Book Cover --}}
                    <div class="col-lg-5 product-visual-column">
                        <div class="book-visual">
                            <img
                                class="product-image book-cover"
                                src="{{ asset('assets/images/' . $p->cover) }}"
                                alt="{{ $p->title }}"
                                loading="lazy"
                            >
                        </div>

                        <div class="book-labels">
                            <div class="book-title-label">
                                {{ $p->title }}
                            </div>

                            <div class="store-label">
                                <i class="fa-solid fa-circle-check"></i>
                                Available at Bookish
                            </div>
                        </div>
                    </div>

                    {{-- Book Information --}}
                    <div class="col-lg-7">
                        <div class="book-info">

                            <span class="category-label">
                                <i class="fa-solid fa-bookmark"></i>
                                {{ $p->category }}
                            </span>

                            <h2 class="book-heading">
                                {{ $p->title }}
                            </h2>

                            <p class="author">
                                <i class="fa-solid fa-pen-nib"></i>
                                Written by
                                <strong>{{ $p->author }}</strong>
                            </p>

                            <div class="price-box">
                                <div>
                                    <span class="price-caption">Bookish Price</span>
                                    <div class="price">
                                        {{ number_format($p->price, 2) }}
                                        <span class="price-currency">$</span>
                                    </div>
                                </div>

                                <div class="condition-badge">
                                    <i class="fa-solid fa-book-open"></i>
                                    {{ $p->condition }}
                                </div>
                            </div>

                            <h3 class="section-heading">
                                About This Book
                            </h3>

                            <p class="description">
                                {{ $p->description }}
                            </p>

                            <div class="details-list">

                                <div class="detail-row">
                                    <span class="detail-name">
                                        <i class="fa-solid fa-user-pen"></i>
                                        Author
                                    </span>

                                    <span class="detail-value">
                                        {{ $p->author }}
                                    </span>
                                </div>

                                <div class="detail-row">
                                    <span class="detail-name">
                                        <i class="fa-solid fa-layer-group"></i>
                                        Category
                                    </span>

                                    <span class="detail-value">
                                        {{ $p->category }}
                                    </span>
                                </div>

                                <div class="detail-row">
                                    <span class="detail-name">
                                        <i class="fa-solid fa-book"></i>
                                        Condition
                                    </span>

                                    <span class="detail-value">
                                        {{ $p->condition }}
                                    </span>
                                </div>

                                <div class="detail-row">
                                    <span class="detail-name">
                                        <i class="fa-solid fa-box"></i>
                                        Availability
                                    </span>

                                    <span class="detail-value stock-status {{ $p->stock > 0 ? '' : 'out-of-stock' }}">
                                        {{ $p->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                    </span>
                                </div>

                            </div>

                            <div class="action-buttons">

                                <form
                                    action="{{ route('cart.store') }}"
                                    method="POST"
                                    class="cart-form"
                                >
                                    @csrf

                                    <input
                                        type="hidden"
                                        name="product_id"
                                        value="{{ $p->id }}"
                                    >

                                    <input
                                        type="hidden"
                                        name="quantity"
                                        value="1"
                                    >

                                    @if ($p->stock > 0)
                                        <button
                                            type="button"
                                            class="btn-cart w-100"
                                            data-url="{{ route('cart.store') }}"
                                            data-id="{{ $p->id }}"
                                        >
                                            <i class="fa-solid fa-bag-shopping"></i>
                                            <span>Add to Cart</span>
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    @else
                                        <button
                                            type="button"
                                            class="sold-out-btn"
                                            disabled
                                        >
                                            <i class="fa-solid fa-ban"></i>
                                            Sold Out
                                        </button>
                                    @endif
                                </form>

                                <a href="{{ route('shop') }}" class="btn-back">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    Back to Shop
                                </a>

                            </div>

                            <div class="product-assurance">
                                <div class="assurance-item">
                                    <i class="fa-solid fa-book-open"></i>
                                    A world of stories
                                </div>

                                <div class="assurance-item">
                                    <i class="fa-solid fa-heart"></i>
                                    Chosen for readers
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

</div>

<script>
    function animateBookToCart(button, imageUrl) {
        const cart = document.getElementById('navbar-cart');

        if (!cart || !imageUrl) {
            return;
        }

        const start = button.getBoundingClientRect();
        const end = cart.getBoundingClientRect();

        const book = document.createElement('img');
        book.src = imageUrl;
        book.alt = '';

        Object.assign(book.style, {
            position: 'fixed',
            left: `${start.left + start.width / 2 - 20}px`,
            top: `${start.top + start.height / 2 - 25}px`,
            width: '40px',
            height: '50px',
            objectFit: 'cover',
            borderRadius: '4px',
            zIndex: '999999',
            pointerEvents: 'none'
        });

        document.body.appendChild(book);

        const animation = book.animate([
            {
                left: `${start.left + start.width / 2 - 20}px`,
                top: `${start.top + start.height / 2 - 25}px`,
                width: '40px',
                height: '50px',
                opacity: 1,
                transform: 'rotate(0deg) scale(1)'
            },
            {
                left: `${end.left + end.width / 2 - 8}px`,
                top: `${end.top + end.height / 2 - 10}px`,
                width: '16px',
                height: '20px',
                opacity: 0.3,
                transform: 'rotate(360deg) scale(0.5)'
            }
        ], {
            duration: 800,
            easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
            fill: 'forwards'
        });

        animation.onfinish = () => book.remove();
        animation.oncancel = () => book.remove();
    }

    function showProductAlert(message, type = 'success') {
        const alertBox = document.getElementById('product-alert');

        if (!alertBox) {
            alert(message);
            return;
        }

        alertBox.textContent = message;
        alertBox.className = `product-alert show ${type}`;

        alertBox.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
        });
    }

    document.querySelectorAll('.bookish-product .btn-cart.w-100').forEach(button => {
        button.addEventListener('click', async function () {
            if (button.disabled) return;

            const image = document.querySelector('.bookish-product .product-image');
            const imageUrl = image ? image.src : null;
            const originalContent = button.innerHTML;

            button.disabled = true;
            button.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Adding...';

            try {
                const csrfMeta = document.querySelector('meta[name="csrf-token"]');

                if (!csrfMeta) {
                    throw new Error('CSRF token not found. Please refresh the page.');
                }

                const response = await fetch(button.dataset.url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfMeta.content
                    },
                    body: JSON.stringify({
                        product_id: button.dataset.id,
                        quantity: 1
                    })
                });

                const data = await response.json();

                if (!response.ok || !data.success) {
                    throw new Error(
                        data.message ||
                        Object.values(data.errors || {}).flat().join(' ') ||
                        'Failed to add the book to your collection.'
                    );
                }

                animateBookToCart(button, imageUrl);

                const cartCount = document.getElementById('cart-count');

                if (cartCount && data.cart_count !== undefined) {
                    cartCount.textContent = data.cart_count;
                }

                showProductAlert(
                    data.message || 'Book added successfully!',
                    'success'
                );

            } catch (error) {
                showProductAlert(
                    error.message || 'Something went wrong. Please try again.',
                    'error'
                );

            } finally {
                button.disabled = false;
                button.innerHTML = originalContent;
            }
        });
    });
</script>

@endsection
