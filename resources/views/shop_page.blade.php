
@extends('layout')

@section('title', 'Shop page')

@section('content')

<style>
/* =========================
   BOOKISH SHOP PAGE
========================= */

.bookish-shop {
    --book-brown: #432719;
    --book-brown-light: #65452f;
    --book-gold: #c79a46;
    --book-gold-light: #e8c777;
    --book-cream: #fffaf2;
    --book-paper: #fffdf9;
    --book-muted: #796b60;
    --book-border: #e7d8c5;

    overflow: hidden;
    background: var(--book-paper);
    color: var(--book-brown);
}

.bookish-shop *,
.bookish-shop *::before,
.bookish-shop *::after {
    box-sizing: border-box;
}

/* =========================
   HERO
========================= */

.bookish-shop .shop-hero {
    position: relative;
    padding: 68px 0;
    overflow: hidden;
    border-bottom: 1px solid rgba(184, 137, 78, .3);
    background:
        radial-gradient(
            ellipse at 85% 35%,
            rgba(213, 170, 99, .22),
            transparent 35%
        ),
        linear-gradient(
            110deg,
            #fff8eb 0%,
            #f5e6cf 57%,
            #e9d1a9 100%
        );
}

.bookish-shop .shop-hero::before {
    position: absolute;
    top: -180px;
    right: -70px;
    width: 470px;
    height: 470px;
    border: 1px solid rgba(184, 137, 78, .3);
    border-radius: 50%;
    content: "";
    pointer-events: none;
}

.bookish-shop .shop-hero::after {
    position: absolute;
    right: -110px;
    bottom: -230px;
    width: 620px;
    height: 310px;
    border: 1px solid rgba(184, 137, 78, .35);
    border-radius: 50%;
    content: "";
    transform: rotate(-12deg);
    pointer-events: none;
}

.bookish-shop .shop-hero .container {
    position: relative;
    z-index: 1;
}

.bookish-shop .shop-hero .intro-excerpt {
    max-width: 510px;
}

.bookish-shop .shop-hero .shop-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 17px;
    color: #96672f;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2.3px;
    text-transform: uppercase;
}

.bookish-shop .shop-hero .shop-eyebrow::before {
    width: 25px;
    height: 2px;
    background: var(--book-gold);
    content: "";
}

.bookish-shop .shop-hero h1 {
    margin: 0;
    color: var(--book-brown);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(36px, 4.7vw, 58px);
    font-weight: 700;
    line-height: 1.2;
    letter-spacing: -1px;
}

.bookish-shop .shop-hero h1 span {
    display: block;
    color: #a7793e;
}

.bookish-shop .shop-hero-copy {
    padding-left: 28px;
    border-left: 2px solid rgba(167, 121, 62, .4);
}

.bookish-shop .shop-hero-copy h2 {
    margin-bottom: 14px;
    color: var(--book-brown);
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(21px, 2.5vw, 29px);
    font-weight: 700;
    line-height: 1.4;
}

.bookish-shop .bookish-hero-description {
    margin-bottom: 0;
    color: #60452f;
    font-size: 14px;
    line-height: 1.95;
}

/* =========================
   SEARCH AND FILTERS
========================= */

.bookish-shop .shop-toolbar {
    padding: 0 0 10px;
    background: var(--book-paper);
}

.bookish-shop .shop-filters {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    width: 100%;
    margin: 38px auto 42px;
}

.bookish-shop .book-search {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
    width: 100%;
    max-width: 560px;
    min-width: 0;
    margin: 0;
    padding: 8px 10px 8px 18px;
    border: 1px solid var(--book-border);
    border-radius: 14px;
    background: var(--book-cream);
    box-shadow: 0 8px 25px rgba(67, 39, 25, .045);
    transition: border-color .25s ease;
}

/* Remove the gold focus effect from the search container */
.bookish-shop .book-search:focus-within {
    border: 1px solid var(--book-border) !important;
    outline: none !important;
    box-shadow: 0 8px 25px rgba(67, 39, 25, .045) !important;
}

.bookish-shop .book-search .search-icon {
    flex-shrink: 0;
    color: var(--book-gold);
    font-size: 16px;
}

.bookish-shop .book-search input,
.bookish-shop .book-search input:focus,
.bookish-shop .book-search input:active,
.bookish-shop .book-search input:focus-visible {
    flex: 1;
    width: 100%;
    min-width: 0;
    padding: 10px 0;
    margin: 0;
    border: none !important;
    border-radius: 0 !important;
    outline: none !important;
    background: transparent !important;
    color: var(--book-brown);
    font-family: inherit;
    font-size: 14px;
    box-shadow: none !important;
    -webkit-appearance: none;
    appearance: none;
}

/* Override template/browser focus styling */
.bookish-shop .book-search input:focus,
.bookish-shop .book-search input:focus-visible {
    border-color: transparent !important;
    outline: 0 !important;
    box-shadow: none !important;
}

.bookish-shop .book-search input::placeholder {
    color: #aa9a88;
    opacity: 1;
}

.bookish-shop .book-search input::-webkit-search-cancel-button {
    cursor: pointer;
}

.bookish-shop .book-search .search-hint {
    padding: 10px 16px;
    border-radius: 9px;
    background: var(--book-brown);
    color: var(--book-cream);
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}

.bookish-shop .condition-filter {
    width: 195px;
    flex-shrink: 0;
}

.bookish-shop .condition-filter .form-select {
    width: 100%;
    height: 56px;
    padding: 0 16px;
    border: 1px solid var(--book-border);
    border-radius: 14px;
    background-color: var(--book-cream);
    color: var(--book-brown);
    font-family: inherit;
    font-size: 13px;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(67, 39, 25, .045);
    transition: border-color .25s ease, box-shadow .25s ease;
}

.bookish-shop .condition-filter .form-select:focus {
    border-color: var(--book-gold);
    box-shadow: 0 0 0 4px rgba(184, 137, 78, .13);
    outline: none;
}

/* =========================
   PRODUCTS SECTION
========================= */

.bookish-shop .product-section {
    padding: 20px 0 75px;
    background: var(--book-paper);
}

.bookish-shop .book-section-heading {
    margin-bottom: 30px;
}

.bookish-shop .book-section-heading .eyebrow {
    display: inline-block;
    margin-bottom: 9px;
    color: #a7793e;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
}

.bookish-shop .book-section-heading h2 {
    margin-bottom: 10px;
    color: var(--book-brown);
    font-size: clamp(27px, 3vw, 37px);
    font-weight: 800;
    line-height: 1.3;
}

.bookish-shop .book-section-heading p {
    margin-bottom: 0;
    color: var(--book-muted);
    font-size: 14px;
    line-height: 1.8;
}

.bookish-shop .book-card-column {
    margin-bottom: 26px;
}

.bookish-shop .book-card {
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
    min-height: 420px;
    padding: 13px;
    overflow: hidden;
    border: 1px solid #eee4d8;
    border-radius: 17px;
    background: #fff;
    box-shadow: 0 7px 24px rgba(67, 39, 25, .045);
    text-decoration: none !important;
    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}

.bookish-shop .book-card:hover {
    transform: translateY(-6px);
    border-color: #ddc49f;
    box-shadow: 0 18px 35px rgba(67, 39, 25, .11);
}

.bookish-shop .book-cover-wrap {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 250px;
    padding: 14px;
    overflow: hidden;
    border-radius: 12px;
    background: radial-gradient(
        circle at 50% 35%,
        #fff 0%,
        #f7efe3 100%
    );
}

.bookish-shop .book-cover-wrap::after {
    position: absolute;
    bottom: 12px;
    left: 25%;
    width: 50%;
    height: 12px;
    border-radius: 50%;
    background: rgba(67, 39, 25, .13);
    filter: blur(9px);
    content: "";
}

.bookish-shop .book-cover {
    position: relative;
    z-index: 1;
    width: auto;
    max-width: 100%;
    height: 220px;
    object-fit: contain;
    border-radius: 4px;
    filter: drop-shadow(5px 8px 6px rgba(45, 27, 17, .17));
    transition: transform .35s ease;
}

.bookish-shop .book-card:hover .book-cover {
    transform: translateY(-4px) scale(1.035);
}

.bookish-shop .book-info {
    display: flex;
    flex: 1;
    flex-direction: column;
    padding: 17px 4px 4px;
}

.bookish-shop .book-eyebrow {
    margin-bottom: 8px;
    color: #a7793e;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.4px;
    text-transform: uppercase;
}

.bookish-shop .book-card .product-title {
    display: -webkit-box;
    min-height: 48px;
    margin: 0 0 15px;
    overflow: hidden;
    color: var(--book-brown);
    font-size: 16px;
    font-weight: 800;
    line-height: 1.5;
    overflow-wrap: anywhere;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}

.bookish-shop .book-card-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-top: auto;
    padding-top: 13px;
    border-top: 1px solid #f0e8df;
}

.bookish-shop .book-card .product-price {
    color: var(--book-brown);
    font-size: 18px;
    font-weight: 800;
}

.bookish-shop .book-view-icon {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 11px;
    background: #f5ead9;
    color: var(--book-brown);
    transition: background .25s ease, color .25s ease;
}

.bookish-shop .book-card:hover .book-view-icon {
    background: var(--book-brown);
    color: var(--book-cream);
}

/* =========================
   EMPTY STATE
========================= */

.bookish-shop .book-empty {
    padding: 55px 20px;
    border: 1px dashed #dfcdb5;
    border-radius: 17px;
    background: var(--book-cream);
    color: var(--book-muted);
    text-align: center;
}

.bookish-shop .book-empty i {
    margin-bottom: 15px;
    color: var(--book-gold);
    font-size: 38px;
}

.bookish-shop .book-empty h4 {
    margin-bottom: 9px;
    color: var(--book-brown);
    font-weight: 800;
}

.bookish-shop .book-empty p {
    margin-bottom: 0;
    font-size: 14px;
}

/* =========================
   TABLET
========================= */

@media (max-width: 991px) {
    .bookish-shop .shop-hero {
        padding: 55px 0;
    }

    .bookish-shop .shop-hero-copy {
        margin-top: 28px;
        padding-left: 18px;
    }

    .bookish-shop .shop-filters {
        margin-top: 30px;
        margin-bottom: 35px;
    }

    .bookish-shop .book-card {
        min-height: 390px;
    }

    .bookish-shop .book-cover-wrap {
        height: 225px;
    }

    .bookish-shop .book-cover {
        height: 200px;
    }
}

/* =========================
   MOBILE
========================= */

@media (max-width: 767px) {
    .bookish-shop .shop-hero {
        padding: 45px 0;
    }

    .bookish-shop .shop-hero h1 {
        font-size: clamp(35px, 8vw, 46px);
    }

    .bookish-shop .shop-hero-copy {
        margin-top: 25px;
        padding-left: 15px;
    }

    .bookish-shop .bookish-hero-description {
        font-size: 13px;
        line-height: 1.85;
    }

    .bookish-shop .shop-filters {
        align-items: stretch;
        gap: 10px;
        margin: 25px auto 30px;
    }

    .bookish-shop .book-search {
        gap: 8px;
        padding: 7px 10px 7px 12px;
    }

    .bookish-shop .book-search input {
        font-size: 12px;
    }

    .bookish-shop .book-search .search-hint {
        display: none;
    }

    .bookish-shop .condition-filter {
        width: 150px;
    }

    .bookish-shop .condition-filter .form-select {
        height: 52px;
        padding: 0 9px;
        font-size: 12px;
    }

    .bookish-shop .product-section {
        padding-top: 15px;
        padding-bottom: 55px;
    }

    .bookish-shop .book-card {
        min-height: 365px;
        padding: 10px;
        border-radius: 14px;
    }

    .bookish-shop .book-cover-wrap {
        height: 205px;
        padding: 9px;
    }

    .bookish-shop .book-cover {
        height: 185px;
    }

    .bookish-shop .book-info {
        padding-top: 14px;
    }

    .bookish-shop .book-eyebrow {
        font-size: 9px;
        letter-spacing: 1px;
    }

    .bookish-shop .book-card .product-title {
        min-height: 42px;
        font-size: 14px;
    }

    .bookish-shop .book-card .product-price {
        font-size: 15px;
    }

    .bookish-shop .book-view-icon {
        width: 31px;
        height: 31px;
        border-radius: 9px;
    }
}

@media (max-width: 380px) {
    .bookish-shop .shop-filters {
        gap: 7px;
    }

    .bookish-shop .book-search {
        gap: 6px;
        padding: 6px 8px;
    }

    .bookish-shop .book-search .search-icon {
        font-size: 13px;
    }

    .bookish-shop .book-search input {
        font-size: 11px;
    }

    .bookish-shop .condition-filter {
        width: 125px;
    }

    .bookish-shop .condition-filter .form-select {
        padding: 0 5px;
        font-size: 10px;
    }

    .bookish-shop .book-card {
        min-height: 330px;
        padding: 8px;
    }

    .bookish-shop .book-cover-wrap {
        height: 175px;
    }

    .bookish-shop .book-cover {
        height: 155px;
    }

    .bookish-shop .book-card .product-title {
        font-size: 13px;
    }
}

/* =========================
   FOCUS STYLES
========================= */

/* Do not show a gold outline around the search input or its wrapper */
.bookish-shop .book-search,
.bookish-shop .book-search:focus,
.bookish-shop .book-search:focus-within,
.bookish-shop .book-search input,
.bookish-shop .book-search input:focus,
.bookish-shop .book-search input:active,
.bookish-shop .book-search input:focus-visible {
    outline: none !important;
    box-shadow: none !important;
}

.bookish-shop .book-search:focus-within {
    border-color: var(--book-border) !important;
}

/* Keep focus indicators for other controls and links */
.bookish-shop a:focus-visible,
.bookish-shop .condition-filter .form-select:focus-visible {
    outline: 2px solid var(--book-gold);
    outline-offset: 3px;
}

/* =========================
   ACCESSIBILITY
========================= */

@media (prefers-reduced-motion: reduce) {
    .bookish-shop *,
    .bookish-shop *::before,
    .bookish-shop *::after {
        scroll-behavior: auto !important;
        animation: none !important;
        transition-duration: .01ms !important;
    }
}
</style>

<div class="bookish-shop">

    <!-- Hero Section -->
    <section class="shop-hero">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <span class="shop-eyebrow">
                            THE BOOKISH COLLECTION
                        </span>

                        <h1>
                            A World of
                            <span>Stories Awaits You</span>
                        </h1>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="shop-hero-copy">
                        <h2>Discover Your Next Favorite Book</h2>

                        <p class="bookish-hero-description">
                            Step into a world of knowledge, imagination, and
                            unforgettable stories with Bookish. Explore our
                            carefully selected collection of novels, timeless
                            classics, personal development books, and educational
                            reads designed to inspire every kind of reader.
                            Browse our collection, discover new authors, and let
                            every page take you on a journey beyond imagination.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Search and Condition Filter -->
    <section class="shop-toolbar">
        <div class="container">
            <div class="shop-filters">

                <div class="book-search">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>

                    <input
                        type="search"
                        id="bookSearch"
                        placeholder="Search books, authors..."
                        autocomplete="off"
                        aria-label="Search books"
                    >

                    <span class="search-hint">Search</span>
                </div>

                <div class="condition-filter">
                    <select
                        id="conditionFilter"
                        class="form-select"
                        aria-label="Filter books by condition"
                    >
                        <option value="">All Conditions</option>
                        <option value="new">New</option>
                        <option value="used">Used</option>
                    </select>
                </div>

            </div>
        </div>
    </section>

    <!-- Books Section -->
    <section class="product-section before-footer-section" id="shop">
        <div class="container">

            <div class="book-section-heading">
                <span class="eyebrow">THE BOOKISH COLLECTION</span>
                <h2>Find Your Next Read</h2>
                <p>Stories, ideas, and adventures waiting for you.</p>
            </div>

            <div class="row" id="bookList">
                @forelse ($data as $d)

                    <div class="col-6 col-md-4 col-lg-3 book-card-column">
                        <a
                            class="book-card"
                            href="{{ route('OneProduct', $d->id) }}"
                        >
                            <div class="book-cover-wrap">
                                <img
                                    src="{{ asset('assets/images/' . $d->cover) }}"
                                    alt="{{ $d->title }}"
                                    class="book-cover"
                                    loading="lazy"
                                >
                            </div>

                            <div class="book-info">
                                <span class="book-eyebrow">
                                    BOOKISH COLLECTION
                                </span>

                                <h3 class="product-title">
                                    {{ $d->title }}
                                </h3>

                                <div class="book-card-bottom">
                                    <strong class="product-price">
                                        {{ $d->price }}$
                                    </strong>

                                    <span class="book-view-icon">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>

                @empty

                    <div class="col-12">
                        <div class="book-empty">
                            <i class="fa-solid fa-book-open d-block"></i>
                            <h4>No books available</h4>
                            <p>Check back soon to discover new stories.</p>
                        </div>
                    </div>

                @endforelse
            </div>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('bookSearch');
    const conditionFilter = document.getElementById('conditionFilter');
    const bookList = document.getElementById('bookList');

    if (!searchInput || !conditionFilter || !bookList) {
        return;
    }

    const searchUrl = "{{ route('searchProducts') }}";
    const productUrl = "{{ url('/OneProduct') }}";
    const imageBaseUrl = "{{ asset('assets/images') }}";

    let searchTimeout;
    let currentRequest = 0;
    let abortController = null;

    function showEmptyState(title, message) {
        const column = document.createElement('div');
        column.className = 'col-12';

        const empty = document.createElement('div');
        empty.className = 'book-empty';

        const icon = document.createElement('i');
        icon.className = 'fa-solid fa-book-open d-block';

        const heading = document.createElement('h4');
        heading.textContent = title;

        const paragraph = document.createElement('p');
        paragraph.textContent = message;

        empty.append(icon, heading, paragraph);
        column.appendChild(empty);
        bookList.replaceChildren(column);
    }

    function createBookCard(product) {
        const column = document.createElement('div');
        column.className = 'col-6 col-md-4 col-lg-3 book-card-column';

        const link = document.createElement('a');
        link.className = 'book-card';
        link.href = `${productUrl}/${encodeURIComponent(product.id)}`;

        const coverWrap = document.createElement('div');
        coverWrap.className = 'book-cover-wrap';

        const image = document.createElement('img');
        image.src = `${imageBaseUrl}/${product.cover ?? ''}`;
        image.alt = product.title ?? '';
        image.className = 'book-cover';
        image.loading = 'lazy';

        image.addEventListener('error', function () {
            image.style.display = 'none';
        }, { once: true });

        coverWrap.appendChild(image);

        const info = document.createElement('div');
        info.className = 'book-info';

        const eyebrow = document.createElement('span');
        eyebrow.className = 'book-eyebrow';
        eyebrow.textContent = 'BOOKISH COLLECTION';

        const title = document.createElement('h3');
        title.className = 'product-title';
        title.textContent = product.title ?? '';

        const bottom = document.createElement('div');
        bottom.className = 'book-card-bottom';

        const price = document.createElement('strong');
        price.className = 'product-price';
        price.textContent = `${product.price ?? ''}$`;

        const viewIcon = document.createElement('span');
        viewIcon.className = 'book-view-icon';

        const arrow = document.createElement('i');
        arrow.className = 'fa-solid fa-arrow-right';

        viewIcon.appendChild(arrow);
        bottom.append(price, viewIcon);
        info.append(eyebrow, title, bottom);
        link.append(coverWrap, info);
        column.appendChild(link);

        return column;
    }

    async function searchBooks() {
        const requestId = ++currentRequest;

        if (abortController) {
            abortController.abort();
        }

        abortController = new AbortController();

        const params = new URLSearchParams({
            search: searchInput.value.trim(),
            condition: conditionFilter.value
        });

        try {
            const response = await fetch(
                `${searchUrl}?${params.toString()}`,
                {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    signal: abortController.signal
                }
            );

            if (!response.ok) {
                throw new Error(`Request failed: ${response.status}`);
            }

            const products = await response.json();

            if (requestId !== currentRequest) {
                return;
            }

            if (!Array.isArray(products) || products.length === 0) {
                showEmptyState(
                    'No books found',
                    'Try another search or condition.'
                );
                return;
            }

            const fragment = document.createDocumentFragment();

            products.forEach(function (product) {
                fragment.appendChild(createBookCard(product));
            });

            bookList.replaceChildren(fragment);

        } catch (error) {
            if (error.name === 'AbortError') {
                return;
            }

            if (requestId !== currentRequest) {
                return;
            }

            console.error('Search error:', error);

            showEmptyState(
                'Something went wrong',
                'Please try searching again.'
            );
        }
    }

    function scheduleSearch() {
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function () {
            searchBooks();
        }, 300);
    }

    searchInput.addEventListener('input', scheduleSearch);
    conditionFilter.addEventListener('change', searchBooks);
});
</script>

@endsection
