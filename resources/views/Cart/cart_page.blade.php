@extends('layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Cart')

@section('content')

<style>
    .bookish-cart {
        --wood: #432719;
        --wood-light: #70452f;
        --wood-medium: #65452f;
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

    .bookish-cart * {
        box-sizing: border-box;
    }

    .bookish-cart a {
        text-decoration: none;
    }

    /* Hero */

    .bookish-cart .cart-hero {
        position: relative;
        overflow: hidden;
        background:
            radial-gradient(circle at 85% 25%, rgba(213,166,91,.13), transparent 28%),
            linear-gradient(120deg, #352016 0%, #432719 55%, #583822 100%);
        padding: 78px 0;
    }

    .bookish-cart .cart-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        opacity: .13;
        pointer-events: none;
        background: repeating-linear-gradient(
            0deg,
            transparent 0,
            transparent 35px,
            rgba(255,250,242,.12) 36px,
            transparent 38px
        );
    }

    .bookish-cart .cart-hero .container {
        position: relative;
        z-index: 1;
    }

    .bookish-cart .cart-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--gold);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 3px;
        margin-bottom: 20px;
    }

    .bookish-cart .cart-eyebrow::before {
        content: "";
        width: 28px;
        height: 2px;
        background: var(--gold);
    }

    .bookish-cart .cart-hero h1 {
        color: var(--cream);
        font-size: clamp(34px, 4.5vw, 54px);
        line-height: 1.2;
        font-weight: 800;
        margin: 0 0 20px;
    }

    .bookish-cart .cart-hero h1 span {
        display: block;
        color: var(--gold);
    }

    .bookish-cart .cart-hero p {
        color: #e8d9c8;
        font-size: 15px;
        line-height: 1.9;
        max-width: 540px;
        margin-bottom: 28px;
    }

    .bookish-cart .cart-shop-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 13px 22px;
        border: 1px solid var(--gold);
        border-radius: 7px;
        background: var(--gold);
        color: var(--wood);
        font-size: 13px;
        font-weight: 700;
        transition: .25s ease;
    }

    .bookish-cart .cart-shop-btn:hover {
        background: var(--gold-light);
        border-color: var(--gold-light);
        color: var(--wood);
        transform: translateY(-2px);
    }

    .bookish-cart .cart-hero-decoration {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 220px;
        height: 220px;
        border: 1px solid rgba(213,166,91,.35);
        border-radius: 50%;
        background: rgba(255,250,242,.035);
        box-shadow: 0 0 0 16px rgba(213,166,91,.035),
                    0 0 0 32px rgba(213,166,91,.025);
    }

    .bookish-cart .cart-hero-decoration i {
        color: var(--gold);
        font-size: 78px;
        margin-bottom: 18px;
    }

    .bookish-cart .cart-hero-decoration span {
        color: #e8d9c8;
        font-size: 12px;
        font-style: italic;
        text-align: center;
    }

    /* Main section */

    .bookish-cart .cart-content {
        padding: 65px 0 80px;
        background: var(--cream);
    }

    .bookish-cart .cart-section-heading {
        margin-bottom: 25px;
    }

    .bookish-cart .cart-section-heading .eyebrow {
        color: #9a7846;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .bookish-cart .cart-section-heading h2 {
        color: var(--wood);
        font-size: 27px;
        font-weight: 800;
        margin: 0;
    }

    .bookish-cart .cart-table-wrapper {
        overflow-x: auto;
        border: 1px solid var(--border);
        border-radius: 12px;
        background: var(--paper);
        box-shadow: 0 10px 30px rgba(67,39,25,.045);
    }

    .bookish-cart .cart-table {
        width: 100%;
        min-width: 760px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .bookish-cart .cart-table thead th {
        background: var(--wood);
        color: var(--gold);
        padding: 19px 16px;
        border: none;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .bookish-cart .cart-table tbody td {
        padding: 19px 16px;
        background: var(--paper);
        color: var(--text);
        border-bottom: 1px solid #f0e5d6;
        vertical-align: middle;
    }

    .bookish-cart .cart-table tbody tr:last-child td {
        border-bottom: none;
    }

    .bookish-cart .cart-table tbody tr {
        transition: background .2s ease;
    }

    .bookish-cart .cart-table tbody tr:hover td {
        background: #fcf4e8;
    }

    .bookish-cart .cart-table tbody td strong {
        color: var(--wood);
        font-weight: 750;
    }

    .bookish-cart .cart-book-image {
        display: block;
        width: 64px;
        height: 84px;
        object-fit: cover;
        border: 1px solid var(--border);
        border-radius: 6px;
        background: #f5ead9;
        box-shadow: 0 4px 10px rgba(67,39,25,.1);
    }

    .bookish-cart .cart-book-title {
        max-width: 230px;
        line-height: 1.6;
    }

    .bookish-cart .cart-price {
        color: var(--wood-medium);
        font-weight: 700;
        white-space: nowrap;
    }

    /* Quantity */

    .bookish-cart .quantity-control {
        display: inline-flex;
        align-items: center;
        width: fit-content;
        border: 1px solid var(--border);
        border-radius: 7px;
        overflow: hidden;
        background: var(--paper);
    }

    .bookish-cart .quantity-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 36px;
        padding: 0;
        border: none;
        background: #f4e8d6;
        color: var(--wood);
        font-size: 19px;
        cursor: pointer;
        transition: .2s ease;
    }

    .bookish-cart .quantity-btn:hover:not(:disabled) {
        background: var(--gold);
    }

    .bookish-cart .quantity-btn:disabled {
        opacity: .5;
        cursor: not-allowed;
    }

    .bookish-cart .quantity-input {
        width: 43px;
        height: 36px;
        padding: 0 3px;
        border: none;
        border-left: 1px solid var(--border);
        border-right: 1px solid var(--border);
        border-radius: 0;
        outline: none;
        box-shadow: none;
        background: var(--paper);
        color: var(--wood);
        text-align: center;
        font-size: 13px;
        font-weight: 700;
    }

    .bookish-cart .quantity-input:focus {
        outline: none;
        box-shadow: none;
        border-color: var(--border);
    }

    .bookish-cart .quantity-message {
        display: block;
        max-width: 155px;
        margin-top: 7px;
        font-size: 11px;
        line-height: 1.5;
    }

    /* Remove */

    .bookish-cart .delete-cart-item {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border: 1px solid #efd7ce;
        border-radius: 7px;
        background: #fbede8;
        color: var(--danger);
        font-size: 22px;
        line-height: 1;
        cursor: pointer;
        transition: .2s ease;
    }

    .bookish-cart .delete-cart-item:hover {
        border-color: var(--danger);
        background: var(--danger);
        color: white;
    }

    .bookish-cart .delete-cart-item:disabled {
        opacity: .6;
        cursor: wait;
    }

    /* Alerts */

    .bookish-cart #alert-container {
        margin-bottom: 18px;
    }

    .bookish-cart #alert-container:empty {
        display: none;
    }

    .bookish-cart .alert {
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 18px;
    }

    /* Bottom panels */

    .bookish-cart .cart-panel {
        height: 100%;
        padding: 25px;
        border: 1px solid var(--border);
        border-radius: 12px;
        background: var(--paper);
        box-shadow: 0 8px 25px rgba(67,39,25,.04);
    }

    .bookish-cart .cart-panel h3 {
        color: var(--wood);
        font-size: 19px;
        font-weight: 800;
        margin-bottom: 9px;
    }

    .bookish-cart .cart-panel p {
        color: var(--muted);
        font-size: 13px;
        line-height: 1.8;
    }

    .bookish-cart .cart-label {
        display: block;
        color: var(--wood);
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .bookish-cart .cart-input {
        min-height: 46px;
        border: 1px solid var(--border);
        border-radius: 7px;
        background: var(--cream);
        color: var(--wood);
        font-size: 13px;
        box-shadow: none;
        outline: none;
    }

    .bookish-cart .cart-input:focus {
        border-color: #c7a36d;
        box-shadow: 0 0 0 3px rgba(213,166,91,.12);
    }

    .bookish-cart .cart-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        min-height: 44px;
        padding: 11px 16px;
        border: 1px solid var(--wood);
        border-radius: 7px;
        background: var(--wood);
        color: var(--cream);
        font-size: 12px;
        font-weight: 750;
        transition: .25s ease;
    }

    .bookish-cart .cart-btn:hover {
        border-color: var(--wood-light);
        background: var(--wood-light);
        color: var(--gold);
        transform: translateY(-1px);
    }

    .bookish-cart .cart-btn-outline {
        border-color: var(--border);
        background: transparent;
        color: var(--wood);
    }

    .bookish-cart .cart-btn-outline:hover {
        border-color: var(--wood);
        background: var(--wood);
        color: var(--cream);
    }

    .bookish-cart .cart-totals {
        margin-top: 28px;
    }

    .bookish-cart .cart-totals-heading {
        padding-bottom: 18px;
        margin-bottom: 20px;
        border-bottom: 1px solid var(--border);
    }

    .bookish-cart .cart-totals-heading h3 {
        color: var(--wood);
        font-size: 19px;
        font-weight: 800;
        margin: 0;
    }

    .bookish-cart .cart-total-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 13px 0;
        color: var(--muted);
        font-size: 13px;
        border-bottom: 1px solid #f1e7d9;
    }

    .bookish-cart .cart-total-row strong {
        color: var(--wood);
        font-size: 14px;
        font-weight: 800;
    }

    .bookish-cart .cart-total-row.final-total {
        padding: 19px 0;
        border-bottom: none;
        color: var(--wood);
        font-size: 15px;
        font-weight: 800;
    }

    .bookish-cart .cart-total-row.final-total strong {
        color: #8b602a;
        font-size: 21px;
    }

    .bookish-cart .checkout-btn {
        min-height: 52px;
        font-size: 13px;
        letter-spacing: .3px;
    }

    .bookish-cart .cart-empty-message {
        padding: 35px 15px !important;
        color: var(--muted) !important;
        text-align: center;
        font-size: 14px;
    }

    .bookish-cart .cart-empty-message > i {
        display: block;
        color: var(--gold);
        font-size: 30px;
        margin-bottom: 12px;
    }

    /* Responsive */

    @media (max-width: 991px) {
        .bookish-cart .cart-hero {
            padding: 60px 0;
        }

        .bookish-cart .cart-hero-decoration {
            width: 180px;
            height: 180px;
        }

        .bookish-cart .cart-hero-decoration i {
            font-size: 60px;
        }

        .bookish-cart .cart-content {
            padding: 45px 0 60px;
        }
    }

    @media (max-width: 767px) {
        .bookish-cart .cart-hero {
            padding: 48px 0;
        }

        .bookish-cart .cart-hero h1 {
            font-size: 35px;
        }

        .bookish-cart .cart-hero p {
            font-size: 13px;
        }

        .bookish-cart .cart-content {
            padding: 35px 0 45px;
        }

        .bookish-cart .cart-panel {
            padding: 20px;
        }

        .bookish-cart .cart-section-heading h2 {
            font-size: 23px;
        }

        .bookish-cart .cart-table {
            min-width: 700px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .bookish-cart *,
        .bookish-cart *::before,
        .bookish-cart *::after {
            transition: none !important;
            animation: none !important;
            scroll-behavior: auto !important;
        }
    }
</style>

<div class="bookish-cart">

    {{-- Cart Hero --}}
    <section class="cart-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="cart-eyebrow">YOUR BOOKISH COLLECTION</span>

                    <h1>
                        Your Cart,
                        <span>Your Next Chapter.</span>
                    </h1>

                    <p>
                        Your favorite stories are just a step away.
                        Review your selected books, update quantities,
                        and get ready to discover your next great read.
                    </p>

                    <a href="{{ route('shop') }}" class="cart-shop-btn">
                        <i class="fa-solid fa-arrow-left"></i>
                        Continue Shopping
                    </a>
                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">
                    <div class="cart-hero-decoration">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Your next great find awaits.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cart Content --}}
    <section class="cart-content" id="cart">
        <div class="container">

            <div id="alert-container"></div>

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session('success') }}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session('error') }}
                </div>
            @endif

            @if (Session::has('ErrorUpdate'))
                <div class="alert alert-danger">
                    {{ Session('ErrorUpdate') }}
                </div>
            @endif

            <div class="cart-section-heading">
                <div class="eyebrow">Your selection</div>
                <h2>Books in Your Cart</h2>
            </div>

            <div class="cart-table-wrapper">
                <table class="table cart-table align-middle">
                    <thead>
                        <tr>
                            <th>Book</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $d)
                            <tr>
                                <td>
                                    <img
                                        src="{{ asset('assets/images/' . $d->product->cover) }}"
                                        alt="{{ $d->product->title }}"
                                        class="cart-book-image"
                                    >
                                </td>

                                <td>
                                    <strong class="cart-book-title">
                                        {{ $d->product->title }}
                                    </strong>
                                </td>

                                <td>
                                    <span class="cart-price">
                                        ${{ number_format($d->product->price, 2) }}
                                    </span>
                                </td>

                                <td>
                                    <div
                                        class="quantity-control"
                                        data-update-url="{{ route('cart.update', $d->id) }}"
                                    >
                                        <button
                                            type="button"
                                            class="quantity-btn decrease"
                                            aria-label="Decrease quantity"
                                        >−</button>

                                        <input
                                            type="number"
                                            name="quantity"
                                            class="quantity-input"
                                            value="{{ $d->quantity }}"
                                            min="1"
                                            max="{{ $d->product->stock }}"
                                            aria-label="Book quantity"
                                        >

                                        <button
                                            type="button"
                                            class="quantity-btn increase"
                                            aria-label="Increase quantity"
                                        >+</button>
                                    </div>

                                    <small class="quantity-message"></small>
                                </td>

                                <td>
                                    <strong class="subtotal">
                                        ${{ number_format($d->product->price * $d->quantity, 2) }}
                                    </strong>
                                </td>

                                <td>
                                    <button
                                        type="button"
                                        class="delete-cart-item"
                                        data-url="{{ route('cart.destroy', $d->id) }}"
                                        data-id="{{ $d->id }}"
                                        aria-label="Remove book"
                                        title="Remove book"
                                    >×</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="cart-empty-message">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <div>Your cart is empty. Find your next favorite book!</div>
                                    <a href="{{ route('shop') }}" class="cart-shop-btn mt-3">
                                        Explore Books
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row g-4 mt-4">

                {{-- Shopping and Coupon --}}
                <div class="col-lg-6">
                    <div class="cart-panel">
                        <h3>Keep Exploring</h3>
                        <p>
                            There are more stories waiting for you.
                            Continue browsing and find your next read.
                        </p>

                        <a href="{{ route('shop') }}" class="cart-btn cart-btn-outline mb-4">
                            <i class="fa-solid fa-arrow-left"></i>
                            Continue Shopping
                        </a>

                        <div class="pt-3">
                            <h3>Have a Coupon?</h3>
                            <p>Enter your coupon code if you have one.</p>

                            <label for="coupon" class="cart-label">
                                Coupon Code
                            </label>

                            <div class="row g-2">
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        class="form-control cart-input"
                                        id="coupon"
                                        placeholder="Enter coupon code"
                                    >
                                </div>

                                <div class="col-sm-4">
                                    <button type="button" class="cart-btn">
                                        Apply Coupon
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Totals --}}
                <div class="col-lg-6">
                    <div class="cart-panel cart-totals">
                        <div class="cart-totals-heading">
                            <h3>Order Summary</h3>
                        </div>

                        <div class="cart-total-row">
                            <span>Subtotal</span>
                            <strong id="cart-subtotal">
                                ${{ number_format($total, 2) }}
                            </strong>
                        </div>

                        <div class="cart-total-row">
                            <span>Shipping</span>
                            <strong>Calculated at checkout</strong>
                        </div>

                        <div class="cart-total-row final-total">
                            <span>Total</span>
                            <strong id="cart-total">
                                ${{ number_format($total, 2) }}
                            </strong>
                        </div>

                        <a href="{{ route('checkout') }}" class="cart-btn checkout-btn">
                            Proceed to Checkout
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    const cartSubtotal = document.querySelector('#cart-subtotal');
    const cartTotal = document.querySelector('#cart-total');
    const cartCount = document.querySelector('#cart-count');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    function updateCartCount(count) {
        if (cartCount && count !== undefined) {
            cartCount.textContent = count;
        }
    }

    function updateCartTotal(total) {
        if (total !== undefined) {
            const formattedTotal = '$' + Number(total).toLocaleString(
                undefined,
                {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }
            );

            if (cartSubtotal) {
                cartSubtotal.textContent = formattedTotal;
            }

            if (cartTotal) {
                cartTotal.textContent = formattedTotal;
            }
        }
    }

    function showAlert(message, type = 'success') {
        const alertContainer = document.getElementById('alert-container');

        if (!alertContainer) return;

        alertContainer.innerHTML = '';

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type}`;
        alertDiv.setAttribute('role', 'alert');
        alertDiv.textContent = message;

        alertContainer.appendChild(alertDiv);
        alertContainer.scrollIntoView({
            behavior: 'smooth',
            block: 'nearest'
        });
    }

    function formatMoney(value) {
        return '$' + Number(value).toLocaleString(
            undefined,
            {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }
        );
    }

    // Update Quantity
    document.querySelectorAll('.quantity-control').forEach(control => {
        const input = control.querySelector('.quantity-input');
        const decrease = control.querySelector('.decrease');
        const increase = control.querySelector('.increase');
        const message = control.parentElement.querySelector('.quantity-message');
        const row = control.closest('tr');
        const subtotal = row.querySelector('.subtotal');

        const updateUrl = control.dataset.updateUrl;
        const stock = Number(input.max);

        let savedQuantity = Number(input.value);
        let isUpdating = false;

        async function updateQuantity(quantity) {
            if (isUpdating) return;

            isUpdating = true;
            decrease.disabled = true;
            increase.disabled = true;
            input.disabled = true;
            message.textContent = '';

            try {
                const response = await fetch(updateUrl, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ quantity })
                });

                const result = await response.json();

                if (!response.ok || !result.success) {
                    throw new Error(
                        result.message ||
                        Object.values(result.errors || {}).flat().join(' ') ||
                        'Failed to update quantity.'
                    );
                }

                savedQuantity = Number(result.quantity);
                input.value = savedQuantity;

                if (result.subtotal !== undefined) {
                    subtotal.textContent = formatMoney(result.subtotal);
                }

                updateCartTotal(result.total);
                updateCartCount(result.cart_count);

            } catch (error) {
                input.value = savedQuantity;
                message.textContent = error.message || 'Something went wrong.';
                message.style.color = '#93432f';

            } finally {
                isUpdating = false;
                decrease.disabled = false;
                increase.disabled = false;
                input.disabled = false;
            }
        }

        decrease.addEventListener('click', () => {
            const quantity = Number(input.value) - 1;

            if (quantity >= 1) {
                updateQuantity(quantity);
            }
        });

        increase.addEventListener('click', () => {
            const quantity = Number(input.value) + 1;

            if (quantity <= stock) {
                updateQuantity(quantity);
            } else {
                message.textContent = 'Not enough stock available.';
                message.style.color = '#93432f';
            }
        });

        input.addEventListener('change', () => {
            const quantity = Number(input.value);

            if (
                !Number.isInteger(quantity) ||
                quantity < 1 ||
                quantity > stock
            ) {
                input.value = savedQuantity;
                message.textContent = 'Enter a quantity within available stock.';
                message.style.color = '#93432f';
                return;
            }

            if (quantity !== savedQuantity) {
                updateQuantity(quantity);
            }
        });
    });

    // Delete Cart Item
    document.querySelectorAll('.delete-cart-item').forEach(button => {
        button.addEventListener('click', async function () {
            if (!confirm('Are you sure you want to delete this product?')) {
                return;
            }

            const deleteButton = this;
            const row = deleteButton.closest('tr');

            deleteButton.disabled = true;

            try {
                const response = await fetch(deleteButton.dataset.url, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                const result = await response.json();

                if (!response.ok || !result.success) {
                    throw new Error(
                        result.message || 'Failed to delete product.'
                    );
                }

                row.remove();

                updateCartCount(result.cart_count);
                updateCartTotal(result.total);

                showAlert(
                    result.message || 'Product deleted successfully.',
                    'success'
                );

                const remainingRows = document.querySelectorAll(
                    '.cart-table tbody tr'
                );

                if (remainingRows.length === 0) {
                    document.querySelector('.cart-table tbody').innerHTML = `
                        <tr>
                            <td colspan="6" class="cart-empty-message">
                                <i class="fa-solid fa-basket-shopping"></i>
                                <div>Your cart is empty.</div>
                                <a href="{{ route('shop') }}" class="cart-shop-btn mt-3">
                                    Explore Books
                                </a>
                            </td>
                        </tr>
                    `;
                }

            } catch (error) {
                showAlert(
                    error.message ||
                    'Could not delete the product. Please try again.',
                    'danger'
                );

                deleteButton.disabled = false;
            }
        });
    });

    window.addEventListener('load', function () {
        const cart = document.getElementById('cart');

        if (cart) {
            cart.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
</script>

@endsection

