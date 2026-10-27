@extends('layout')

@section('title', 'Blog')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/bookish-blog.css') }}">
<style>

/* Blog Hero — Matching Sell Page */
.blog-hero {
    --wood-dark: #2f1b10;
    --gold: #c79a46;

    position: relative;
    isolation: isolate;
    overflow: hidden;
    min-height: 345px;
    padding: 55px 0 45px;

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
        );

    border-bottom: 1px solid rgba(184, 137, 78, .35);
}

.blog-hero::before {
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

.blog-hero::after {
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

.blog-hero > .container {
    position: relative;
    z-index: 1;
}

.blog-hero .intro-excerpt {
    padding: 15px 0;
}

.blog-hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 15px;

    color: #96651f;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 3px;
    text-transform: uppercase;
}

.blog-hero-eyebrow::before,
.blog-hero-eyebrow::after {
    display: inline-block;
    width: 25px;
    height: 1px;
    background: var(--gold);
    content: "";
}

.blog-hero .intro-excerpt h1 {
    margin: 0 0 18px;
    color: var(--wood-dark);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(40px, 5.2vw, 64px);
    font-weight: 700;
    line-height: 1.1;
    letter-spacing: -1.5px;
}

.blog-hero .intro-excerpt h1 span {
    color: #a8782d;
}

.blog-hero .intro-excerpt p {
    max-width: 480px;
    color: #60452f;
    font-size: 15px;
    line-height: 1.85;
}

.blog-hero-image {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 245px;
}

.blog-hero-image img {
    position: relative;
    z-index: 1;
    display: block;
    width: 100%;
    max-width: 420px;
    max-height: 300px;
    object-fit: contain;

    filter: drop-shadow(0 18px 20px rgba(47, 27, 16, .2));
    transition: transform .35s ease;
}

.blog-hero-image img:hover {
    transform: translateY(-6px) rotate(-1deg);
}

/* Hero Buttons */
.blog-hero .btn-secondary {
    border: 1px solid #a8782d;
    border-radius: 8px;
    background: linear-gradient(110deg, #80521c, #c69a4e 55%, #a8782d);
    color: #fffaf2;
    transition: transform .25s ease, box-shadow .25s ease;
}

.blog-hero .btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 7px 16px rgba(125, 81, 28, .2);
}

.blog-hero .btn-white-outline {
    border: 1px solid #b8894e;
    border-radius: 8px;
    color: #68432e;
    background: rgba(255, 250, 242, .4);
    transition: background .25s ease, color .25s ease;
}

.blog-hero .btn-white-outline:hover {
    background: #432719;
    color: #fffaf2;
}

@media (max-width: 767px) {
    .blog-hero {
        min-height: auto;
        padding: 35px 0 25px;
    }

    .blog-hero .intro-excerpt h1 {
        font-size: clamp(38px, 9vw, 54px);
    }

    .blog-hero .intro-excerpt p {
        font-size: 14px;
    }

    .blog-hero-image {
        min-height: 175px;
    }

    .blog-hero-image img {
        max-width: 280px;
        max-height: 220px;
    }

    .blog-hero-eyebrow {
        gap: 8px;
        font-size: 10px;
        letter-spacing: 2px;
    }

    .blog-hero-eyebrow::before,
    .blog-hero-eyebrow::after {
        width: 17px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .blog-hero-image img,
    .blog-hero .btn {
        transition: none !important;
    }
}

</style>
<!-- Hero -->

<!-- Hero -->
<section class="blog-hero">
    <div class="container">
        <div class="row justify-content-between align-items-center">

            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <span class="blog-hero-eyebrow">
                        The World Between Pages
                    </span>

                    <h1>Every Book <span>Has a Story</span></h1>

                    <p class="mb-4">
                        Discover the journeys hidden between the pages.
                        From the moment an author writes the first word
                        to the day a reader closes the final chapter,
                        every book leaves a story of its own.
                    </p>

                    <p>
                        <a href="#book-stories" class="btn btn-secondary me-2">
                            Explore Stories
                        </a>

                        <a href="{{ route('shop') }}" class="btn btn-white-outline">
                            Find a Book
                        </a>
                    </p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="blog-hero-image">
                    <img
                        src="{{ asset('assets/images/book_3d_moby_dick.png') }}"
                        alt="Books arranged on a warm wooden bookshelf">
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Book Stories -->
<div class="blog-section" id="book-stories">
    <div class="container">

        <div class="section-heading">
            <span class="eyebrow">The World Between Pages</span>
            <h2>Stories Beyond the Cover</h2>

            <p>
                Books are more than ink and paper. They carry memories,
                preserve knowledge, connect generations, and find new
                meaning every time someone opens their pages.
            </p>
        </div>

        <div class="row g-4" id="blog">

            @forelse ($stories as $story)

                <div class="col-12 col-sm-6 col-md-4">
                    <article class="post-entry">

                        <a
                            href="{{ route('story.show', $story->slug) }}"
                            class="post-thumbnail">

                            <img
                                src="{{ asset($story->cover_image) }}"
                                alt="{{ $story->title }}"
                                loading="lazy">
                        </a>

                        <div class="post-content-entry">

                            <span class="post-category">
                                {{ $story->category }}
                            </span>

                            <h3>
                                <a href="{{ route('story.show', $story->slug) }}">
                                    {{ $story->title }}
                                </a>
                            </h3>

                            <p class="post-description">
                                {{ $story->excerpt }}
                            </p>

                            <a
                                href="{{ route('story.show', $story->slug) }}"
                                class="read-more">
                                Read More
                            </a>

                        </div>
                    </article>
                </div>

            @empty

                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fa-solid fa-book-open fa-3x mb-3"></i>

                        <h3>No Stories Available</h3>

                        <p>
                            There are no published stories at the moment.
                            Please check back soon!
                        </p>
                    </div>
                </div>

            @endforelse

        </div>

        <!-- Pagination -->
        @if ($stories->hasPages())
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    {{ $stories->links() }}
                </div>
            </div>
        @endif

    </div>
</div>

<!-- Bookish Message -->
<section class="story-banner">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-2">
                <div class="story-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>
            </div>

            <div class="col-lg-7">
                <h2>Every Book Deserves Another Chapter</h2>

                <p class="mb-0">
                    At Bookish, we believe a book's journey should not
                    end when its first reader closes the cover. Give
                    stories another chance, discover pre-loved treasures,
                    and let great books continue to inspire.
                </p>
            </div>

            <div class="col-lg-3 text-lg-end">
                <a href="{{ route('shop') }}" class="btn btn-primary">
                    Explore Our Books
                </a>
            </div>

        </div>
    </div>
</section>

<!-- Reading Inspiration -->
<section class="testimonial-section">
    <div class="container">

        <div class="section-heading">
            <span class="eyebrow">A Thought to Remember</span>
            <h2 class="section-title">The Magic of Reading</h2>

            <p>
                A few words can open a new world, change a perspective,
                or stay with us for a lifetime.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="testimonial-block text-center">

                    <blockquote class="mb-4">
                        <p>
                            &ldquo;A book is more than a collection
                            of pages. It is a journey, a memory,
                            and a conversation between minds
                            across time.&rdquo;
                        </p>
                    </blockquote>

                    <div class="author-info">

                        <div class="story-icon mx-auto">
                            <i class="fa-solid fa-book-open-reader"></i>
                        </div>

                        <h3 class="font-weight-bold">
                            The Bookish Philosophy
                        </h3>

                        <span class="position d-block mb-3">
                            Every reader adds a new chapter
                        </span>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
