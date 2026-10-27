@extends('layout')

@section('title', 'Home')

@section('content')

<style>
/* =========================
   BOOKISH HOME PAGE
========================= */

:root {
    --home-brown: #432719;
    --home-brown-light: #65452f;
    --home-gold: #c79a46;
    --home-gold-light: #e8c777;
    --home-cream: #fffaf2;
    --home-paper: #fffdf9;
    --home-muted: #796b60;
    --home-border: #e7d8c5;
}

.home-page {
    overflow: hidden;
    background: var(--home-paper);
    color: var(--home-brown);
}

.home-page img {
    max-width: 100%;
}

.home-page .section-heading {
    margin-bottom: 38px;
}

.home-page .section-heading .eyebrow {
    display: inline-block;
    margin-bottom: 12px;
    color: #a7793e;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.home-page .section-heading h2 {
    margin-bottom: 12px;
    color: var(--home-brown);
    font-size: clamp(27px, 3vw, 38px);
    font-weight: 800;
    line-height: 1.3;
}

.home-page .section-heading p {
    max-width: 620px;
    margin-bottom: 0;
    color: var(--home-muted);
    line-height: 1.8;
}

/* =========================
   HERO SECTION
========================= */

.home-page .hero {
    position: relative;
    padding: 65px 0 60px;
    overflow: hidden;
    background:
        radial-gradient(
            ellipse at 82% 42%,
            rgba(213, 170, 99, .24),
            transparent 35%
        ),
        linear-gradient(
            110deg,
            #fff8eb 0%,
            #f5e6cf 57%,
            #e9d1a9 100%
        );
    border-bottom: 1px solid rgba(184, 137, 78, .3);
}

.home-page .hero::before {
    position: absolute;
    top: -150px;
    right: -80px;
    width: 510px;
    height: 510px;
    border: 1px solid rgba(184, 137, 78, .32);
    border-radius: 50%;
    content: "";
    pointer-events: none;
}

.home-page .hero::after {
    position: absolute;
    right: -120px;
    bottom: -205px;
    width: 700px;
    height: 290px;
    border: 1px solid rgba(184, 137, 78, .4);
    border-radius: 50%;
    content: "";
    transform: rotate(-8deg);
    pointer-events: none;
}

.home-page .hero .container {
    position: relative;
    z-index: 2;
}

.home-page .hero .intro-excerpt {
    max-width: 510px;
}

.home-page .hero .home-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 22px;
    color: #96672f;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2.5px;
    text-transform: uppercase;
}

.home-page .hero .home-eyebrow::before {
    width: 25px;
    height: 2px;
    background: var(--home-gold);
    content: "";
}

.home-page .hero h1 {
    margin-bottom: 22px;
    color: var(--home-brown);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(38px, 5vw, 64px);
    font-weight: 700;
    line-height: 1.15;
    letter-spacing: -1.2px;
}

.home-page .hero h1 span {
    display: block;
    margin-top: 5px;
    color: #a7793e;
}

.home-page .hero .home-hero-description {
    max-width: 450px;
    margin-bottom: 30px;
    color: #60452f;
    font-size: 15px;
    line-height: 1.9;
}

.home-page .home-btn-primary,
.home-page .home-btn-outline {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 14px 22px;
    border: 1px solid transparent;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition:
        transform .25s ease,
        background .25s ease,
        color .25s ease,
        border-color .25s ease,
        box-shadow .25s ease;
}

.home-page .home-btn-primary {
    background: var(--home-brown);
    color: var(--home-cream);
    box-shadow: 0 6px 16px rgba(67, 39, 25, .13);
}

.home-page .home-btn-primary:hover {
    transform: translateY(-3px);
    background: #68432e;
    color: #fffaf2;
    box-shadow: 0 10px 22px rgba(67, 39, 25, .18);
}

.home-page .home-btn-outline {
    border-color: rgba(67, 39, 25, .35);
    background: rgba(255, 250, 242, .5);
    color: var(--home-brown);
}

.home-page .home-btn-outline:hover {
    transform: translateY(-3px);
    border-color: var(--home-gold);
    background: var(--home-cream);
    color: #8b5d23;
}

.home-page .hero-img-wrap {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 390px;
}

.home-page .hero-img-wrap img {
    width: 100%;
    max-width: 490px;
    max-height: 450px;
    object-fit: contain;
    filter: drop-shadow(0 20px 22px rgba(47, 27, 16, .22));
    animation: homeBookFloat 5s ease-in-out infinite;
}

@keyframes homeBookFloat {
    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }
}

/* =========================
   TRUST STRIP
========================= */

.home-page .home-trust-strip {
    position: relative;
    z-index: 2;
    padding: 23px 0;
    border-bottom: 1px solid var(--home-border);
    background: var(--home-cream);
}

.home-page .trust-item {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    height: 100%;
    padding: 8px 10px;
}

.home-page .trust-icon {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    width: 43px;
    height: 43px;
    border-radius: 13px;
    background: #f1e5d2;
    color: var(--home-brown);
    font-size: 17px;
}

.home-page .trust-item strong {
    display: block;
    margin-bottom: 3px;
    color: var(--home-brown);
    font-size: 13px;
}

.home-page .trust-item span {
    color: var(--home-muted);
    font-size: 11px;
}

/* =========================
   FEATURED BOOKS
========================= */

.home-page .product-section {
    padding: 90px 0;
    background: var(--home-paper);
}

.home-page .home-section-intro {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 35px;
}

.home-page .home-section-intro .section-heading {
    margin-bottom: 0;
}

.home-page .home-text-link {
    display: inline-flex;
    align-items: center;
    flex-shrink: 0;
    gap: 9px;
    padding-bottom: 7px;
    color: var(--home-brown);
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: color .2s ease;
}

.home-page .home-text-link:hover {
    color: #a7793e;
}

.home-page .home-featured-book {
    display: flex;
    flex-direction: column;
    height: 100%;
    padding: 13px;
    overflow: hidden;
    border: 1px solid #eee4d8;
    border-radius: 17px;
    background: #fff;
    box-shadow: 0 8px 25px rgba(67, 39, 25, .045);
    text-decoration: none;
    transition: transform .3s ease, box-shadow .3s ease;
}

.home-page .home-featured-book:hover {
    transform: translateY(-7px);
    box-shadow: 0 18px 35px rgba(67, 39, 25, .11);
}

.home-page .home-featured-cover {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 245px;
    overflow: hidden;
    border-radius: 11px;
    background: linear-gradient(145deg, #fbf5eb, #f1e6d5);
}

.home-page .home-featured-cover img {
    width: auto;
    max-width: 90%;
    height: 215px;
    object-fit: contain;
    filter: drop-shadow(5px 8px 6px rgba(45, 27, 17, .17));
    transition: transform .3s ease;
}

.home-page .home-featured-book:hover .home-featured-cover img {
    transform: scale(1.04);
}

.home-page .home-featured-info {
    display: flex;
    flex: 1;
    flex-direction: column;
    padding: 17px 4px 5px;
}

.home-page .home-featured-info small {
    margin-bottom: 8px;
    color: #a7793e;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.home-page .home-featured-info h3 {
    min-height: 45px;
    margin-bottom: 15px;
    color: var(--home-brown);
    font-size: 16px;
    font-weight: 800;
    line-height: 1.5;
}

.home-page .home-book-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-top: auto;
    padding-top: 13px;
    border-top: 1px solid #f0e8df;
    color: var(--home-brown);
}

.home-page .home-book-link strong {
    font-size: 17px;
}

.home-page .home-book-link span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    border-radius: 10px;
    background: #f5ead9;
    color: var(--home-brown);
    transition: .25s ease;
}

.home-page .home-featured-book:hover .home-book-link span {
    background: var(--home-brown);
    color: white;
}

/* =========================
   WHY CHOOSE BOOKISH
========================= */

.home-page .why-choose-section {
    padding: 90px 0;
    background: #f8f1e7;
}

.home-page .home-feature {
    height: 100%;
    padding: 23px 19px;
    border: 1px solid rgba(234, 223, 206, .9);
    border-radius: 15px;
    background: rgba(255, 253, 249, .88);
    transition: transform .25s ease, box-shadow .25s ease;
}

.home-page .home-feature:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(67, 39, 25, .07);
}

.home-page .home-feature .icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 49px;
    height: 49px;
    margin-bottom: 19px;
    border-radius: 14px;
    background: #efe0c9;
}

.home-page .home-feature .icon img {
    width: 25px;
    height: 25px;
}

.home-page .home-feature h3 {
    margin-bottom: 10px;
    color: var(--home-brown);
    font-size: 16px;
    font-weight: 800;
}

.home-page .home-feature p {
    margin-bottom: 0;
    color: var(--home-muted);
    font-size: 13px;
    line-height: 1.8;
}

.home-page .home-why-image {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 420px;
    padding: 20px;
    border: 1px solid rgba(199, 154, 70, .12);
    border-radius: 25px;
    background: linear-gradient(145deg, #ead9bf, #f9f1e5);
}

.home-page .home-why-image img {
    max-width: 100%;
    max-height: 460px;
    object-fit: contain;
    filter: drop-shadow(0 18px 18px rgba(67, 39, 25, .15));
}

/* =========================
   READING SECTION
========================= */

.home-page .we-help-section {
    padding: 95px 0;
    background: var(--home-paper);
}

.home-page .home-reading-art {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 400px;
    padding: 24px;
    border-radius: 24px;
    background: #f7eee1;
}

.home-page .home-reading-art img {
    max-width: 100%;
    max-height: 390px;
    object-fit: contain;
    filter: drop-shadow(0 15px 15px rgba(67, 39, 25, .12));
}

.home-page .home-reading-copy {
    padding: 15px 0 15px 20px;
}

.home-page .home-reading-copy > p {
    color: var(--home-muted);
    line-height: 1.9;
}

.home-page .home-check-list {
    display: grid;
    gap: 14px;
    padding: 0;
    margin: 25px 0 30px;
    list-style: none;
}

.home-page .home-check-list li {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    color: var(--home-brown-light);
    font-size: 14px;
    line-height: 1.6;
}

.home-page .home-check-list i {
    margin-top: 3px;
    color: #a7793e;
}

/* =========================
   POPULAR BOOKS
========================= */

.home-page .popular-product {
    padding: 85px 0;
    background: #f8f1e7;
}

.home-page .home-popular-card {
    display: flex;
    gap: 18px;
    height: 100%;
    padding: 19px;
    border: 1px solid #ebdfcf;
    border-radius: 16px;
    background: #fffdf9;
    transition: transform .25s ease, box-shadow .25s ease;
}

.home-page .home-popular-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(67, 39, 25, .08);
}

.home-page .home-popular-card .thumbnail {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    width: 95px;
    height: 130px;
    overflow: hidden;
    border-radius: 10px;
    background: #f1e5d2;
}

.home-page .home-popular-card .thumbnail img {
    width: 100%;
    height: 100%;
    padding: 7px;
    object-fit: contain;
}

.home-page .home-popular-card h3 {
    margin: 4px 0 8px;
    color: var(--home-brown);
    font-size: 16px;
    font-weight: 800;
    line-height: 1.4;
}

.home-page .home-popular-card p {
    margin-bottom: 12px;
    color: var(--home-muted);
    font-size: 12px;
}

.home-page .home-popular-card a {
    color: #9a6c35;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
}

.home-page .home-popular-card a:hover {
    color: var(--home-brown);
}

/* =========================
   POPULAR AUTHORS
========================= */

.home-page .testimonial-section {
    padding: 90px 0;
    background: var(--home-paper);
}

.home-page .testimonial-section .testimonial-block {
    padding: 35px;
    border: 1px solid #eee3d4;
    border-radius: 22px;
    background: var(--home-cream);
    box-shadow: 0 8px 25px rgba(67, 39, 25, .035);
}

.home-page .testimonial-section blockquote {
    color: var(--home-muted);
    font-size: 15px;
    line-height: 1.9;
}

.home-page .testimonial-section .author-pic {
    width: 95px;
    height: 95px;
    margin: 0 auto 18px;
    overflow: hidden;
    border: 4px solid #ead9bf;
    border-radius: 50%;
    background: #f1e5d2;
}

.home-page .testimonial-section .author-pic img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.home-page .testimonial-section .author-info h3 {
    color: var(--home-brown);
    font-size: 19px;
    font-weight: 800;
}

.home-page .testimonial-section .position {
    color: #a7793e;
    font-size: 12px;
}

.home-page #testimonial-nav {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 22px;
}

.home-page #testimonial-nav .prev,
.home-page #testimonial-nav .next {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border: 1px solid #e5d6c2;
    border-radius: 12px;
    background: var(--home-cream);
    color: var(--home-brown);
    cursor: pointer;
    transition: .2s ease;
}

.home-page #testimonial-nav .prev:hover,
.home-page #testimonial-nav .next:hover {
    border-color: var(--home-brown);
    background: var(--home-brown);
    color: white;
}

/* =========================
   RESPONSIVE DESIGN
========================= */

@media (max-width: 991px) {
    .home-page .hero {
        padding: 55px 0;
    }

    .home-page .hero-img-wrap {
        min-height: 300px;
        margin-top: 20px;
    }

    .home-page .hero-img-wrap img {
        max-height: 350px;
    }

    .home-page .home-why-image {
        min-height: 330px;
        margin-top: 35px;
    }

    .home-page .home-reading-copy {
        padding: 30px 0 0;
    }

    .home-page .trust-item {
        justify-content: flex-start;
    }
}

@media (max-width: 767px) {
    .home-page .home-section-intro {
        align-items: flex-start;
        flex-direction: column;
    }

    .home-page .home-section-intro .section-heading {
        margin-bottom: 0;
    }

    .home-page .home-reading-art {
        min-height: 320px;
    }

    .home-page .home-reading-art img {
        max-height: 300px;
    }

    .home-page .home-why-image img {
        max-height: 350px;
    }
}

@media (max-width: 575px) {
    .home-page .hero {
        padding: 42px 0;
    }

    .home-page .hero h1 {
        font-size: 39px;
        letter-spacing: -.7px;
    }

    .home-page .hero .home-hero-description {
        font-size: 14px;
    }

    .home-page .hero-img-wrap {
        min-height: 240px;
    }

    .home-page .hero-img-wrap img {
        max-height: 270px;
    }

    .home-page .home-btn-primary,
    .home-page .home-btn-outline {
        padding: 12px 15px;
        font-size: 12px;
    }

    .home-page .product-section,
    .home-page .why-choose-section,
    .home-page .we-help-section,
    .home-page .popular-product,
    .home-page .testimonial-section {
        padding: 60px 0;
    }

    .home-page .home-featured-cover {
        height: 190px;
    }

    .home-page .home-featured-cover img {
        height: 165px;
    }

    .home-page .home-featured-info h3 {
        font-size: 14px;
    }

    .home-page .home-book-link strong {
        font-size: 14px;
    }

    .home-page .home-popular-card {
        gap: 12px;
        padding: 12px;
    }

    .home-page .home-popular-card .thumbnail {
        width: 78px;
        height: 110px;
    }

    .home-page .testimonial-section .testimonial-block {
        padding: 22px 16px;
    }

    .home-page .testimonial-section blockquote {
        font-size: 14px;
    }

    .home-page .trust-item {
        justify-content: flex-start;
        gap: 8px;
        padding: 8px 3px;
    }

    .home-page .trust-icon {
        width: 35px;
        height: 35px;
        border-radius: 10px;
        font-size: 14px;
    }

    .home-page .trust-item strong {
        font-size: 11px;
    }

    .home-page .trust-item span {
        font-size: 10px;
    }
}

/* =========================
   ACCESSIBILITY
========================= */

.home-page a:focus-visible,
.home-page .prev:focus-visible,
.home-page .next:focus-visible {
    outline: 3px solid var(--home-gold);
    outline-offset: 4px;
}

@media (prefers-reduced-motion: reduce) {
    .home-page .hero-img-wrap img {
        animation: none;
    }

    .home-page *,
    .home-page *::before,
    .home-page *::after {
        scroll-behavior: auto !important;
        transition-duration: .01ms !important;
    }
}
</style>

<div class="home-page">

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-lg-5">
                    <div class="intro-excerpt">

                        <span class="home-eyebrow">
                            THE BOOKISH EXPERIENCE
                        </span>

                        <h1>
                            Every book
                            <span>has a second story</span>
                        </h1>

                        <p class="home-hero-description">
                            Browse new and second-hand books. Every used
                            copy is photographed and described by condition,
                            so you know exactly what you're getting.
                            Discover your next adventure, one page at a time.
                        </p>

                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('shop') }}"
                               class="home-btn-primary">
                                Explore Books
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                            <a href="#Help"
                               class="home-btn-outline">
                                Our Story
                                <i class="fa-solid fa-book-open"></i>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img
                            src="{{ asset('assets/images/book_3d_great_expectations.png') }}"
                            class="img-fluid"
                            alt="Great Expectations book"
                        >
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Trust Strip -->
    <div class="home-trust-strip">
        <div class="container">
            <div class="row">

                <div class="col-6 col-lg-3">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <div>
                            <strong>Books for Everyone</strong>
                            <span>Stories for every taste</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i class="fa-solid fa-rotate"></i>
                        </div>
                        <div>
                            <strong>Second-Hand Finds</strong>
                            <span>Give books another story</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i class="fa-solid fa-compass"></i>
                        </div>
                        <div>
                            <strong>Discover More</strong>
                            <span>Find your next favorite</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="trust-item">
                        <div class="trust-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div>
                            <strong>Made for Readers</strong>
                            <span>A home for book lovers</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Featured Product Section -->
    <div class="product-section">
        <div class="container">

            <div class="home-section-intro">
                <div class="section-heading">
                    <span class="eyebrow">HANDPICKED FOR YOU</span>
                    <h2>Discover Your Next Favorite Book</h2>
                    <p>
                        Explore inspiring stories, timeless classics,
                        and unforgettable adventures.
                    </p>
                </div>

                <a href="{{ route('shop') }}" class="home-text-link">
                    View All Books
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <div class="row">

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a class="home-featured-book"
                       href="{{ route('OneProduct', 8) }}">

                        <div class="home-featured-cover">
                            <img
                                src="{{ asset('assets/images/Book1.jpg') }}"
                                alt="Treasure Island"
                                loading="lazy"
                            >
                        </div>

                        <div class="home-featured-info">
                            <small>Classic Adventure</small>
                            <h3>Treasure Island</h3>

                            <div class="home-book-link">
                                <strong>$25.00</strong>
                                <span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a class="home-featured-book"
                       href="{{ route('OneProduct', 12) }}">

                        <div class="home-featured-cover">
                            <img
                                src="{{ asset('assets/images/Book4.jpg') }}"
                                alt="The Scrivener"
                                loading="lazy"
                            >
                        </div>

                        <div class="home-featured-info">
                            <small>Literary Fiction</small>
                            <h3>The Scrivener</h3>

                            <div class="home-book-link">
                                <strong>$18.00</strong>
                                <span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a class="home-featured-book"
                       href="{{ route('OneProduct', 10) }}">

                        <div class="home-featured-cover">
                            <img
                                src="{{ asset('assets/images/Book3.jpg') }}"
                                alt="Frankenstein"
                                loading="lazy"
                            >
                        </div>

                        <div class="home-featured-info">
                            <small>Gothic Classic</small>
                            <h3>Frankenstein</h3>

                            <div class="home-book-link">
                                <strong>$23.00</strong>
                                <span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>

                    </a>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <a class="home-featured-book"
                       href="{{ route('OneProduct', 13) }}">

                        <div class="home-featured-cover">
                            <img
                                src="{{ asset('assets/images/Book6.jpg') }}"
                                alt="Moby Dick or The White Whale"
                                loading="lazy"
                            >
                        </div>

                        <div class="home-featured-info">
                            <small>Epic Classic</small>
                            <h3>Moby Dick or The White Whale</h3>

                            <div class="home-book-link">
                                <strong>Discover Price</strong>
                                <span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>

                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">

            <div class="row justify-content-between align-items-center">

                <div class="col-lg-7">

                    <div class="section-heading">
                        <span class="eyebrow">WHY BOOKISH?</span>
                        <h2>More Than Just a Bookstore</h2>
                        <p>
                            Discover your next favorite book with ease.
                            Explore inspiring stories and enjoy a reading
                            experience made for curious minds.
                        </p>
                    </div>

                    <div class="row g-3">

                        <div class="col-6">
                            <div class="home-feature">
                                <div class="icon">
                                    <img
                                        src="{{ asset('assets/images/truck.svg') }}"
                                        alt="Book selection"
                                        class="img-fluid"
                                    >
                                </div>
                                <h3>Wide Book Selection</h3>
                                <p>
                                    Explore novels, educational books,
                                    and inspiring reads for every taste.
                                </p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="home-feature">
                                <div class="icon">
                                    <img
                                        src="{{ asset('assets/images/bag.svg') }}"
                                        alt="Online shopping"
                                        class="img-fluid"
                                    >
                                </div>
                                <h3>Easy Shopping</h3>
                                <p>
                                    Explore book details and find your
                                    next read in just a few clicks.
                                </p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="home-feature">
                                <div class="icon">
                                    <img
                                        src="{{ asset('assets/images/support.svg') }}"
                                        alt="Books for every reader"
                                        class="img-fluid"
                                    >
                                </div>
                                <h3>For Every Reader</h3>
                                <p>
                                    From thrilling adventures to
                                    practical knowledge and learning.
                                </p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="home-feature">
                                <div class="icon">
                                    <img
                                        src="{{ asset('assets/images/return.svg') }}"
                                        alt="A better reading journey"
                                        class="img-fluid"
                                    >
                                </div>
                                <h3>A Second Story</h3>
                                <p>
                                    Give pre-loved books another chance
                                    to inspire a new reader.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="home-why-image">
                        <img
                            src="{{ asset('assets/images/book_3d_moby_dick.png') }}"
                            alt="Moby Dick book"
                            class="img-fluid"
                            loading="lazy"
                        >
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Reading Section -->
    <div class="we-help-section" id="Help">
        <div class="container">

            <div class="row align-items-center justify-content-between">

                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="home-reading-art">
                        <img
                            src="{{ asset('assets/images/book_3d_pride_and_prejudice.png') }}"
                            alt="Pride and Prejudice book"
                            loading="lazy"
                        >
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="home-reading-copy">

                        <div class="section-heading">
                            <span class="eyebrow">TURN THE PAGE</span>
                            <h2>We Help You Discover the Joy of Reading</h2>
                        </div>

                        <p>
                            At Bookish, every book opens the door to a new
                            world. Explore novels, inspiring stories, and
                            educational books that help you imagine, learn,
                            and grow.
                        </p>

                        <ul class="home-check-list">
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                A wide collection for every kind of reader
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                Discover novels, classics, and new stories
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                Find books that match your interests
                            </li>
                            <li>
                                <i class="fa-solid fa-circle-check"></i>
                                Give second-hand books a new life
                            </li>
                        </ul>

                        <a href="{{ route('shop') }}#shop"
                           class="home-btn-primary">
                            Explore the Collection
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Reading Section -->

    <!-- Popular Product -->
    <div class="popular-product">
        <div class="container">

            <div class="section-heading">
                <span class="eyebrow">READERS' FAVORITES</span>
                <h2>Popular Books</h2>
                <p>
                    Discover beloved stories that continue to inspire readers.
                </p>
            </div>

            <div class="row">

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="home-popular-card">

                        <div class="thumbnail">
                            <img
                                src="{{ asset('assets/images/Book9.jpg') }}"
                                alt="Emma"
                                loading="lazy"
                            >
                        </div>

                        <div class="pt-1">
                            <h3>Emma</h3>
                            <p>Authored by Jane Austen</p>
                            <a href="{{ route('OneProduct', 7) }}">
                                Discover Book
                                <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="home-popular-card">

                        <div class="thumbnail">
                            <img
                                src="{{ asset('assets/images/Book6.jpg') }}"
                                alt="Moby Dick or The White Whale"
                                loading="lazy"
                            >
                        </div>

                        <div class="pt-1">
                            <h3>Moby Dick or The White Whale</h3>
                            <p>Authored by Herman Melville</p>
                            <a href="{{ route('OneProduct', 13) }}">
                                Discover Book
                                <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="home-popular-card">

                        <div class="thumbnail">
                            <img
                                src="{{ asset('assets/images/Empire of storm.jpg') }}"
                                alt="The Count of Monte-Cristo"
                                loading="lazy"
                            >
                        </div>

                        <div class="pt-1">
                            <h3>Empire of Stream</h3>
                            <p>Authored by Sarah J.Maas</p>
                            <a href="{{ route('OneProduct', 18) }}">
                                Discover Book
                                <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- End Popular Product -->

    <!-- Popular Authors -->
    <div class="testimonial-section">
        <div class="container">

            <div class="section-heading text-center">
                <span class="eyebrow">THE MINDS BEHIND THE STORIES</span>
                <h2 class="section-title">
                    Popular Authors in
                    <script>document.write(new Date().getFullYear());</script>
                </h2>
                <p class="mx-auto">
                    Meet some of the writers creating unforgettable worlds
                    and stories for readers everywhere.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="testimonial-slider-wrap text-center">

                        <div id="testimonial-nav">
                            <span class="prev"
                                  data-controls="prev"
                                  aria-label="Previous author">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>

                            <span class="next"
                                  data-controls="next"
                                  aria-label="Next author">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                        </div>

                        <div class="testimonial-slider">

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-4">
                                                <p>
                                                    Known for immersive,
                                                    character-driven novels
                                                    such as The Seven Husbands
                                                    of Evelyn Hugo and
                                                    Daisy Jones &amp; The Six,
                                                    Taylor Jenkins Reid creates
                                                    stories that stay with
                                                    readers long after the
                                                    final page.
                                                </p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img
                                                        src="{{ asset('assets/images/Taylor Jenkins Reid.jpg') }}"
                                                        alt="Taylor Jenkins Reid"
                                                        class="img-fluid"
                                                        loading="lazy"
                                                    >
                                                </div>

                                                <h3 class="font-weight-bold">
                                                    Taylor Jenkins Reid
                                                </h3>

                                                <span class="position d-block mb-3">
                                                    Contemporary Fiction
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-4">
                                                <p>
                                                    Sarah J. Maas is known for
                                                    imaginative fantasy worlds,
                                                    intricate conflicts, and
                                                    memorable characters in
                                                    popular series such as
                                                    A Court of Thorns and Roses
                                                    and Crescent City.
                                                </p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img
                                                        src="{{ asset('assets/images/Sarah J. Maas.jpg') }}"
                                                        alt="Sarah J. Maas"
                                                        class="img-fluid"
                                                        loading="lazy"
                                                    >
                                                </div>

                                                <h3 class="font-weight-bold">
                                                    Sarah J. Maas
                                                </h3>

                                                <span class="position d-block mb-3">
                                                    Fantasy Fiction
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-4">
                                                <p>
                                                    Percival Everett is an
                                                    acclaimed American novelist
                                                    whose inventive writing
                                                    explores identity, culture,
                                                    and society with sharp wit
                                                    and distinctive storytelling.
                                                </p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img
                                                        src="{{ asset('assets/images/Percival Everett.jpg') }}"
                                                        alt="Percival Everett"
                                                        class="img-fluid"
                                                        loading="lazy"
                                                    >
                                                </div>

                                                <h3 class="font-weight-bold">
                                                    Percival Everett
                                                </h3>

                                                <span class="position d-block mb-3">
                                                    Literary Fiction
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Popular Authors -->

</div>

@endsection

