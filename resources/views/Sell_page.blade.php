@extends('layout')

@section('title', 'Sell Your Book')

@section('content')

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

.sell-page,

.sell-page * {

    box-sizing: border-box;

}

.sell-page {

    overflow: hidden;

    color: var(--text);

    background:

        radial-gradient(ellipse at top left, #fffaf0 0%, transparent 55%),

        linear-gradient(135deg, #f7f0e5, #eee0cc);

    font-family: inherit;

}

/* Hero */

.sell-hero {

    position: relative;

    overflow: hidden;

    min-height: 345px;

    padding: 55px 0 45px;

    background:

        radial-gradient(ellipse at 82% 50%, rgba(213, 170, 99, .18), transparent 35%),

        linear-gradient(110deg, #fff8eb 0%, #f5e6cf 57%, #e9d1a9 100%);

    border-bottom: 1px solid rgba(184, 137, 78, .35);

}

.sell-hero::before {

    position: absolute;

    top: -150px;

    right: -80px;

    width: 510px;

    height: 510px;

    border: 1px solid rgba(184, 137, 78, .35);

    border-radius: 50%;

    content: "";

}

.sell-hero::after {

    position: absolute;

    right: -120px;

    bottom: -205px;

    width: 700px;

    height: 290px;

    border: 1px solid rgba(184, 137, 78, .45);

    border-radius: 50%;

    content: "";

    transform: rotate(-8deg);

}

.sell-hero .container {

    position: relative;

    z-index: 2;

}

.sell-hero-content {

    padding: 15px 0;

}

.sell-eyebrow {

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

.sell-eyebrow::before,

.sell-eyebrow::after {

    display: inline-block;

    width: 32px;

    height: 1px;

    background: var(--gold);

    content: "";

}

.sell-hero h1 {

    margin: 0 0 18px;

    color: var(--wood-dark);

    font-family: Georgia, "Times New Roman", serif;

    font-size: clamp(40px, 5.5vw, 68px);

    font-weight: 700;

    line-height: 1.1;

    letter-spacing: -1.5px;

}

.sell-hero h1 span {

    color: #a8782d;

}

.sell-hero p {

    max-width: 480px;

    margin: 0;

    color: #60452f;

    font-size: 16px;

    line-height: 1.85;

}

.sell-hero-image {

    position: relative;

    display: flex;

    align-items: center;

    justify-content: center;

    min-height: 245px;

}

.sell-hero-image img {

    position: relative;

    z-index: 1;

    width: 100%;

    max-width: 350px;

    max-height: 280px;

    object-fit: contain;

    filter: drop-shadow(0 18px 20px rgba(47, 27, 16, .2));

    transition: transform .35s ease;

}

.sell-hero-image img:hover {

    transform: translateY(-6px) rotate(-1deg);

}

/* Main */

.sell-main {

    position: relative;

    z-index: 3;

    padding: 20px 0 75px;

}

.sell-container {

    width: 100%;

    max-width: 1180px;

    margin: 0 auto;

    padding: 0 20px;

}

.sell-card {

    display: grid;

    grid-template-columns: minmax(270px, .72fr) minmax(0, 1.48fr);

    overflow: hidden;

    border: 2px solid #d9ae59;

    border-radius: 20px;

    background: var(--paper);

    box-shadow:

        0 24px 55px rgba(62, 38, 27, .13),

        0 3px 10px rgba(184, 137, 78, .08);

}

/* Wood Sidebar */

.sell-sidebar {

    position: relative;

    display: flex;

    flex-direction: column;

    overflow: hidden;

    padding: 42px 35px 35px;

    color: var(--paper);

    background:

        radial-gradient(ellipse at 10% 10%, rgba(213, 170, 99, .09), transparent 40%),

        repeating-linear-gradient(

            0deg,

            transparent 0,

            transparent 32px,

            rgba(255, 255, 255, .018) 33px,

            transparent 35px

        ),

        linear-gradient(145deg, #432719 0%, #2f1b10 75%, #24140c 100%);

}

.sell-sidebar::before {

    position: absolute;

    right: -85px;

    bottom: -85px;

    width: 300px;

    height: 300px;

    border: 1px solid rgba(213, 170, 99, .14);

    border-radius: 50%;

    content: "";

}

.sell-sidebar::after {

    position: absolute;

    right: -35px;

    bottom: -105px;

    width: 240px;

    height: 240px;

    border: 1px solid rgba(213, 170, 99, .13);

    border-radius: 50%;

    content: "";

}

.sell-brand {

    display: inline-flex;

    align-items: center;

    gap: 12px;

    width: fit-content;

    margin-bottom: 35px;

    color: var(--gold-light);

    font-family: Georgia, "Times New Roman", serif;

    font-size: 31px;

    font-weight: 700;

    text-decoration: none;

}

.sell-brand:hover {

    color: #f2d58e;

}

.sell-brand i {

    font-size: 34px;

}

.sell-brand-line {

    width: 54px;

    height: 2px;

    margin: -17px 0 30px;

    background: var(--gold);

}

.sell-book-icon {

    display: flex;

    align-items: center;

    justify-content: center;

    width: 108px;

    height: 108px;

    margin-bottom: 25px;

    border: 2px solid var(--gold);

    border-radius: 25px;

    color: var(--gold-light);

    background: rgba(255, 250, 242, .035);

    box-shadow: inset 0 0 25px rgba(213, 170, 99, .05);

}

.sell-book-icon i {

    font-size: 48px;

}

.sell-sidebar h2 {

    margin: 0 0 16px;

    color: #fff4e1;

    font-family: Georgia, "Times New Roman", serif;

    font-size: clamp(25px, 2.4vw, 32px);

    font-weight: 700;

    line-height: 1.25;

}

.sell-sidebar > p {

    margin: 0;

    color: #e0cbb1;

    font-size: 14px;

    line-height: 1.95;

}

.sell-sidebar-tip {

    position: relative;

    z-index: 1;

    margin-top: 27px;

    padding: 18px;

    border: 1px solid #b8893d;

    border-radius: 14px;

    background: rgba(15, 8, 4, .19);

}

.sell-sidebar-tip h3 {

    display: flex;

    align-items: center;

    gap: 10px;

    margin: 0 0 10px;

    color: var(--gold-light);

    font-family: Georgia, "Times New Roman", serif;

    font-size: 19px;

    font-weight: 700;

}

.sell-sidebar-tip h3 i {

    font-size: 15px;

}

.sell-sidebar-tip p {

    margin: 0;

    color: #f0dfc9;

    font-size: 13px;

    line-height: 1.8;

}

/* Form Area */

.sell-form-area {

    min-width: 0;

    padding: 35px 36px 32px;

    background:

        radial-gradient(ellipse at 95% 5%, rgba(222, 191, 137, .13), transparent 35%),

        linear-gradient(135deg, #fffaf2, #f8eedc);

}

.sell-form-heading {

    margin-bottom: 26px;

}

.sell-form-heading h2 {

    margin: 0 0 8px;

    color: var(--wood-dark);

    font-family: Georgia, "Times New Roman", serif;

    font-size: 32px;

    font-weight: 700;

}

.sell-form-heading p {

    margin: 0;

    color: var(--muted);

    font-size: 14px;

    line-height: 1.7;

}

.sell-form .form-group {

    min-width: 0;

    margin-bottom: 21px;

}

.sell-form .form-group label {

    display: block;

    margin-bottom: 9px;

    color: var(--wood-dark);

    font-size: 13px;

    font-weight: 700;

}

.sell-required {

    color: #a8782d;

}

.sell-form .form-control {

    display: block;

    width: 100%;

    min-height: 49px;

    padding: 12px 14px;

    border: 1px solid #d7b57d;

    border-radius: 11px;

    outline: none;

    background: rgba(255, 250, 242, .7);

    color: var(--text);

    font-family: inherit;

    font-size: 13px;

    box-shadow: none;

    transition: border-color .25s ease, box-shadow .25s ease, background .25s ease;

}

.sell-form .form-control::placeholder {

    color: #938477;

}

.sell-form .form-control:focus {

    border-color: #b8893d;

    background: #fffdf9;

    box-shadow: 0 0 0 4px rgba(184, 137, 78, .13);

}

.sell-form select.form-control {

    cursor: pointer;

}

.sell-form textarea.form-control {

    min-height: 98px;

    resize: vertical;

}

.sell-form-row {

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 22px;

}

/* Image Upload */

.sell-upload-label {

    display: block;

    margin-bottom: 10px;

    color: var(--wood-dark);

    font-size: 13px;

    font-weight: 700;

}

.sell-image-row {

    display: grid;

    grid-template-columns: minmax(0, 1fr) 150px;

    align-items: stretch;

    gap: 16px;

}

.sell-upload-area {

    position: relative;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    min-height: 175px;

    padding: 18px;

    overflow: hidden;

    border: 1.5px dashed #cba567;

    border-radius: 13px;

    background: rgba(252, 246, 236, .8);

    text-align: center;

    cursor: pointer;

    transition: border-color .25s ease, background .25s ease;

}

.sell-upload-area:hover,

.sell-upload-area:focus-within {

    border-color: #a8782d;

    background: #f6ead5;

}

.sell-upload-icon {

    display: flex;

    align-items: center;

    justify-content: center;

    width: 55px;

    height: 55px;

    margin-bottom: 10px;

    border-radius: 50%;

    background: #f1dfbd;

    color: #96651f;

    font-size: 22px;

}

.sell-upload-area strong {

    color: var(--wood-dark);

    font-size: 13px;

}

.sell-upload-area > span {

    margin-top: 7px;

    color: var(--muted);

    font-size: 11px;

}

.sell-upload-area input {

    position: absolute;

    inset: 0;

    width: 100%;

    height: 100%;

    opacity: 0;

    cursor: pointer;

}

.sell-upload-button {

    display: inline-block;

    margin-top: 12px;

    padding: 9px 17px;

    border-radius: 9px;

    background: linear-gradient(135deg, #b8893d, #86571f);

    color: white;

    font-size: 12px;

    font-weight: 700;

}

.sell-image-preview-wrap {

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    min-width: 0;

    padding: 10px;

    border-radius: 12px;

    background: #f0e0c6;

}

.sell-image-preview {

    display: none;

    width: 100%;

    max-width: 130px;

    height: 135px;

    border-radius: 8px;

    object-fit: contain;

    filter: drop-shadow(3px 5px 5px rgba(45, 27, 17, .15));

}

.sell-image-preview-placeholder {

    display: flex;

    align-items: center;

    justify-content: center;

    width: 100%;

    height: 135px;

    color: #a67b3b;

    font-size: 42px;

}

.sell-image-preview-caption {

    margin-top: 8px;

    color: #805b2b;

    font-size: 11px;

    text-align: center;

    overflow-wrap: anywhere;

}

/* Submit */

.sell-button {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 11px;

    width: 100%;

    min-height: 53px;

    margin-top: 25px;

    padding: 13px 20px;

    border: 1px solid #bd9048;

    border-radius: 13px;

    background: linear-gradient(110deg, #80521c, #c69a4e 55%, #a8782d);

    color: #fffaf2;

    font-family: inherit;

    font-size: 14px;

    font-weight: 700;

    cursor: pointer;

    box-shadow: 0 6px 15px rgba(125, 81, 28, .15);

    transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;

}

.sell-button:hover {

    transform: translateY(-2px);

    filter: brightness(1.05);

    box-shadow: 0 10px 22px rgba(125, 81, 28, .22);

}

.sell-button:active {

    transform: translateY(0);

}

.sell-button i:last-child {

    font-size: 12px;

}

/* Preview */

.sell-preview {

    display: none;

    margin-top: 24px;

    padding: 22px;

    border: 1px solid #d4aa62;

    border-radius: 15px;

    background:

        radial-gradient(ellipse at top right, rgba(213, 170, 99, .12), transparent 45%),

        #fbf2e2;

    animation: sellPreviewIn .3s ease;

}

@keyframes sellPreviewIn {

    from {

        opacity: 0;

        transform: translateY(8px);

    }

    to {

        opacity: 1;

        transform: translateY(0);

    }

}

.sell-preview-heading {

    display: flex;

    align-items: center;

    gap: 11px;

    margin-bottom: 18px;

}

.sell-preview-heading i {

    color: #a8782d;

    font-size: 23px;

}

.sell-preview-heading h3 {

    margin: 0;

    color: var(--wood-dark);

    font-family: Georgia, "Times New Roman", serif;

    font-size: 21px;

}

.sell-preview-details {

    display: grid;

    grid-template-columns: 100px minmax(0, 1fr);

    gap: 10px 14px;

    margin: 0;

    font-size: 13px;

    line-height: 1.65;

}

.sell-preview-details dt {

    color: var(--wood-dark);

    font-weight: 700;

}

.sell-preview-details dd {

    margin: 0;

    color: var(--muted);

    overflow-wrap: anywhere;

}

.sell-preview-price {

    color: #8b5c20 !important;

    font-weight: 800;

}

/* Responsive */

@media (max-width: 991px) {

    .sell-card {

        grid-template-columns: minmax(240px, .75fr) minmax(0, 1.35fr);

    }

    .sell-sidebar {

        padding: 32px 25px;

    }

    .sell-form-area {

        padding: 30px 25px;

    }

    .sell-form-row {

        gap: 14px;

    }

    .sell-image-row {

        grid-template-columns: minmax(0, 1fr) 115px;

        gap: 10px;

    }

}

@media (max-width: 767px) {

    .sell-hero {

        padding: 35px 0 25px;

    }

    .sell-hero h1 {

        font-size: clamp(38px, 9vw, 54px);

    }

    .sell-hero p {

        font-size: 14px;

    }

    .sell-hero-image {

        min-height: 175px;

    }

    .sell-hero-image img {

        max-width: 240px;

        max-height: 200px;

    }

    .sell-main {

        padding: 15px 0 45px;

    }

    .sell-container {

        padding: 0 13px;

    }

    .sell-card {

        grid-template-columns: 1fr;

        border-radius: 17px;

    }

    .sell-sidebar {

        padding: 28px 24px;

    }

    .sell-brand {

        margin-bottom: 25px;

        font-size: 27px;

    }

    .sell-brand-line {

        margin-top: -12px;

        margin-bottom: 24px;

    }

    .sell-book-icon {

        width: 78px;

        height: 78px;

        margin-bottom: 20px;

        border-radius: 18px;

    }

    .sell-book-icon i {

        font-size: 35px;

    }

    .sell-sidebar h2 {

        max-width: 360px;

        font-size: 27px;

    }

    .sell-sidebar > p {

        font-size: 13px;

    }

    .sell-sidebar-tip {

        margin-top: 20px;

    }

    .sell-form-area {

        padding: 28px 22px;

    }

    .sell-form-heading h2 {

        font-size: 29px;

    }

    .sell-image-row {

        grid-template-columns: minmax(0, 1fr) 105px;

    }

    .sell-upload-area {

        min-height: 165px;

        padding: 12px;

    }

    .sell-image-preview-wrap {

        padding: 7px;

    }

    .sell-image-preview,

    .sell-image-preview-placeholder {

        height: 125px;

    }

}

@media (max-width: 420px) {

    .sell-container {

        padding: 0 9px;

    }

    .sell-sidebar {

        padding: 25px 19px;

    }

    .sell-form-area {

        padding: 24px 15px;

    }

    .sell-form-row {

        grid-template-columns: 1fr;

        gap: 0;

    }

    .sell-image-row {

        grid-template-columns: minmax(0, 1fr);

    }

    .sell-image-preview-wrap {

        min-height: 120px;

    }

    .sell-image-preview,

    .sell-image-preview-placeholder {

        height: 120px;

    }

    .sell-upload-area {

        min-height: 155px;

    }

    .sell-preview {

        padding: 16px 13px;

    }

    .sell-preview-details {

        grid-template-columns: 83px minmax(0, 1fr);

        gap: 9px;

        font-size: 12px;

    }

}

@media (prefers-reduced-motion: reduce) {

    .sell-hero-image img,

    .sell-card *,

    .sell-button {

        transition: none !important;

        animation: none !important;

    }

}

</style>

<main class="sell-page">

    <!-- Hero Section -->

    <section class="sell-hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <div class="sell-hero-content">

                        <div class="sell-eyebrow">

                            Give Books a New Chapter

                        </div>

                        <h1>Sell Your <span>Book</span></h1>

                        <p>

                            Have a book that deserves another reader?

                            Share it with our community and give your

                            favorite stories a new home.

                        </p>

                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="sell-hero-image">

                        <img

                            src="{{ asset('assets/images/book_3d_pride_and_prejudice.png') }}"

                            alt="A book from the Bookish collection"

                            loading="lazy"

                        >

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Sell Book Form -->

    <section class="sell-main">

        <div class="sell-container">

            <div class="sell-card">

                <!-- Sidebar -->

                <aside class="sell-sidebar">

                    <a href="{{ url('/') }}" class="sell-brand">

                        <i class="fa-solid fa-book-open"></i>

                        <span>Bookish.</span>

                    </a>

                    <div class="sell-brand-line"></div>

                    <div class="sell-book-icon">

                        <i class="fa-solid fa-book-open"></i>

                    </div>

                    <h2>Every Book Deserves Another Reader.</h2>

                    <p>

                        Turn the books on your shelf into someone else's

                        next favorite story. Add your book details, choose

                        its condition, and set a price that feels right.

                    </p>

                    <div class="sell-sidebar-tip">

                        <h3>

                            <i class="fa-solid fa-star"></i>

                            Seller tip

                        </h3>

                        <p>

                            Choose a clear photo, describe the book honestly,

                            and set a fair price to help readers make the

                            right choice.

                        </p>

                    </div>

                </aside>

                <!-- Form Area -->

                <section class="sell-form-area">

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="sell-form-heading">

                        <h2>Book Details</h2>

                        <p>

                            Tell us a little about the book you want to sell.

                        </p>

                    </div>

                    <form id="sellBookForm" method="POST" action="{{ route('sellBook') }}" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="bookName">
                                Book Name <span class="sell-required">*</span>
                            </label>
                            <input
                                class="form-control"
                                type="text"
                                id="bookName"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="e.g. The Alchemist"
                                required
                            >
                        </div>

                        <div class="sell-form-row">
                            <div class="form-group">
                                <label for="bookAuthor">
                                    Author Name <span class="sell-required">*</span>
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="bookAuthor"
                                    name="author"
                                    value="{{ old('author') }}"
                                    placeholder="e.g. Charles Dickens"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label for="bookPrice">
                                    Price (USD) <span class="sell-required">*</span>
                                </label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="bookPrice"
                                    name="price"
                                    value="{{ old('price') }}"
                                    placeholder="e.g. 12.99"
                                    min="0.01"
                                    step="0.01"
                                    required
                                >
                            </div>
                        </div>

                        <div class="sell-form-row">
                            <div class="form-group">
                                <label for="bookCategory">
                                    Category <span class="sell-required">*</span>
                                </label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="bookCategory"
                                    name="category"
                                    value="{{ old('category') }}"
                                    placeholder="e.g. Fiction"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label for="bookStock">
                                    Quantity <span class="sell-required">*</span>
                                </label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="bookStock"
                                    name="stock"
                                    value="{{ old('stock', 1) }}"
                                    min="1"
                                    step="1"
                                    required
                                >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="bookDescription">Description</label>
                            <textarea
                                class="form-control"
                                id="bookDescription"
                                name="description"
                                placeholder="Tell readers about the book, its edition, or any visible wear..."
                            >{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="sell-upload-label" for="bookImage">
                                Book Cover Image <span class="sell-required">*</span>
                            </label>

                            <div class="sell-image-row">
                                <label class="sell-upload-area" for="bookImage">
                                    <span class="sell-upload-icon">
                                        <i class="fa-solid fa-camera"></i>
                                    </span>
                                    <strong>Choose a book cover photo</strong>
                                    <span>JPG, PNG or WEBP</span>
                                    <span class="sell-upload-button" style="color: white;">Choose File</span>
                                    <input
                                        type="file"
                                        id="bookImage"
                                        name="cover"
                                        accept="image/jpeg,image/png,image/webp"
                                        required
                                    >
                                </label>

                                <div class="sell-image-preview-wrap">
                                    <div class="sell-image-preview-placeholder" id="imagePlaceholder">
                                        <i class="fa-solid fa-book-open"></i>
                                    </div>
                                    <img
                                        id="imagePreview"
                                        class="sell-image-preview"
                                        alt="Book cover preview"
                                    >
                                    <span class="sell-image-preview-caption" id="imagePreviewCaption">
                                        <i class="fa-regular fa-eye"></i>
                                        Preview Image
                                    </span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="sell-button">
                            <i class="fa-regular fa-paper-plane"></i>
                            <span>Submit Book</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </form>

                </section>

            </div>

        </div>

    </section>

</main>

<script>

    const sellForm = document.getElementById('sellBookForm');

    const bookImage = document.getElementById('bookImage');

    const imagePreview = document.getElementById('imagePreview');

    const imagePlaceholder = document.getElementById('imagePlaceholder');

    const imagePreviewCaption = document.getElementById('imagePreviewCaption');

    let currentImageUrl = null;

    bookImage.addEventListener('change', function () {

        const file = this.files[0];

        if (currentImageUrl) {

            URL.revokeObjectURL(currentImageUrl);

            currentImageUrl = null;

        }

        if (!file) {

            imagePreview.style.display = 'none';

            imagePreview.removeAttribute('src');

            imagePlaceholder.style.display = 'flex';

            imagePreviewCaption.innerHTML =

                '<i class="fa-regular fa-eye"></i> Preview Image';

            return;

        }

        const allowedTypes = [

            'image/jpeg',

            'image/png',

            'image/webp'

        ];

        if (!allowedTypes.includes(file.type)) {

            this.value = '';

            imagePreview.style.display = 'none';

            imagePlaceholder.style.display = 'flex';

            imagePreview.removeAttribute('src');

            imagePreviewCaption.textContent = 'Please select JPG, PNG or WEBP';

            return;

        }

        currentImageUrl = URL.createObjectURL(file);

        imagePreview.src = currentImageUrl;

        imagePreview.style.display = 'block';

        imagePlaceholder.style.display = 'none';

        imagePreviewCaption.textContent = file.name;

    });

    window.addEventListener('beforeunload', function () {

        if (currentImageUrl) {

            URL.revokeObjectURL(currentImageUrl);

        }

    });

</script>

@endsection
