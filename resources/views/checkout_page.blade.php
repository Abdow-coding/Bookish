<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | Bookish</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/checkout.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brown: #5c4033;
            --dark-brown: #38271f;
            --wood: #987451;
            --cream: #f7f2e9;
            --paper: #fffdf9;
            --border: #e9dfd2;
            --muted: #8c8177;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--dark-brown);
            font-family: 'DM Sans', sans-serif;
        }

        a {
            text-decoration: none;
        }

        .checkout-page {
            padding: 65px 20px 85px;
            min-height: 100vh;
            background:
                radial-gradient(ellipse at top left, #eadcc9 0, transparent 35%),
                var(--cream);
        }

        .checkout-container {
            max-width: 1180px;
            margin: auto;
        }

        .checkout-header {
            margin-bottom: 35px;
        }

        .eyebrow {
            color: var(--wood);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .checkout-header h1 {
            margin: 12px 0;
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 4vw, 45px);
            font-weight: 700;
        }

        .checkout-header h1 span {
            color: var(--wood);
        }

        .checkout-header p {
            color: var(--muted);
            font-size: 14px;
        }

        .breadcrumb {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            color: #a99a8c;
            font-size: 12px;
        }

        .breadcrumb a {
            color: var(--wood);
        }

        .breadcrumb strong {
            color: var(--dark-brown);
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(310px, .9fr);
            align-items: start;
            gap: 27px;
        }

        .checkout-main {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .checkout-card {
            padding: 29px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--paper);
            box-shadow: 0 10px 30px rgba(60, 40, 25, .04);
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 26px;
        }

        .section-icon {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #f0e5d6;
            color: var(--brown);
            font-size: 17px;
        }

        .section-heading h2 {
            margin: 0 0 5px;
            font-size: 17px;
            font-weight: 700;
        }

        .section-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        .step {
            margin-left: auto;
            color: #d7c7b5;
            font-size: 21px;
            font-weight: 700;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px 16px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label {
            color: #59463b;
            font-size: 12px;
            font-weight: 700;
        }

        .field label span {
            color: #ad6649;
        }

        .field label .optional {
            color: #a99a8c;
            font-weight: 400;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            min-height: 47px;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            background: #fffefa;
            color: var(--dark-brown);
            font-family: inherit;
            font-size: 13px;
            transition: .2s;
        }

        .field textarea {
            min-height: 95px;
            resize: vertical;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: var(--wood);
            box-shadow: 0 0 0 3px rgba(152, 116, 81, .12);
        }

        .field input::placeholder,
        .field textarea::placeholder {
            color: #b7aca1;
        }

        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 16px;
            border: 1px solid var(--border);
            border-radius: 11px;
            background: #fffefa;
            cursor: pointer;
            transition: .2s;
        }

        .payment-option:hover,
        .payment-option.selected {
            border-color: var(--wood);
            background: #fbf5ed;
        }

        .payment-option input {
            accent-color: var(--brown);
        }

        .payment-icon {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            width: 39px;
            height: 39px;
            border-radius: 10px;
            background: #eee2d3;
            color: var(--brown);
        }

        .payment-details {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .payment-details strong {
            font-size: 13px;
        }

        .payment-details small {
            color: var(--muted);
            font-size: 11px;
        }

        .popular {
            margin-left: auto;
            padding: 5px 8px;
            border-radius: 20px;
            background: #e8eee2;
            color: #526849;
            font-size: 10px;
        }

        .payment-note {
            margin: 17px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .payment-note i {
            color: #61775b;
            margin-right: 5px;
        }

        .checkout-sidebar {
            position: sticky;
            top: 25px;
        }

        .order-summary {
            padding: 26px 23px;
            border: 1px solid #d7c3ac;
            border-radius: 16px;
            background: var(--paper);
            box-shadow: 0 10px 30px rgba(60, 40, 25, .05);
        }

        .summary-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        .summary-header h2 {
            margin: 8px 0 0;
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            font-weight: 700;
        }

        .summary-header>i {
            display: grid;
            place-items: center;
            width: 43px;
            height: 43px;
            border-radius: 12px;
            background: #eee1d1;
            color: var(--brown);
            font-size: 19px;
        }

        .summary-items {
            display: flex;
            flex-direction: column;
        }

        .summary-item {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            padding: 19px 0;
            border-bottom: 1px solid #f0e9e0;
        }

        .book-cover {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            width: 47px;
            height: 60px;
            border-radius: 4px 7px 7px 4px;
            background: linear-gradient(145deg, #a88965, #604332);
            color: #f9efdf;
            box-shadow: inset 4px 0 rgba(30, 20, 15, .15);
            font-size: 20px;
        }

        .book-info {
            flex: 1;
            min-width: 0;
        }

        .book-info h3 {
            margin: 2px 0 6px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.5;
        }

        .book-info p {
            margin: 0 0 5px;
            color: var(--muted);
            font-size: 11px;
        }

        .book-info .unit-price {
            color: var(--wood);
            font-size: 11px;
        }

        .item-price {
            flex-shrink: 0;
            padding-top: 3px;
            font-size: 12px;
        }

        .summary-divider {
            height: 1px;
            margin: 19px 0;
            background: var(--border);
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin: 15px 0;
            color: var(--muted);
            font-size: 12px;
        }

        .summary-line strong {
            color: var(--dark-brown);
        }

        .shipping-text {
            max-width: 130px;
            color: var(--wood) !important;
            font-size: 10px;
            text-align: right;
        }

        .summary-total {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .summary-total span {
            font-size: 15px;
            font-weight: 700;
        }

        .summary-total strong {
            color: var(--brown);
            font-size: 25px;
        }

        .place-order {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-top: 25px;
            padding: 17px 19px;
            border: 0;
            border-radius: 9px;
            background: var(--brown);
            color: #fff9f0;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .place-order:hover {
            background: var(--dark-brown);
            transform: translateY(-2px);
        }

        .summary-footnote {
            display: flex;
            justify-content: center;
            gap: 7px;
            margin: 15px 0 0;
            color: var(--muted);
            font-size: 10px;
            line-height: 1.6;
            text-align: center;
        }

        .summary-footnote i {
            color: #61775b;
        }

        .back-to-cart {
            display: block;
            margin-top: 20px;
            padding-top: 17px;
            border-top: 1px solid var(--border);
            color: var(--wood);
            font-size: 12px;
            font-weight: 700;
            text-align: center;
        }

        .back-to-cart:hover {
            color: var(--dark-brown);
        }

        .help-card {
            display: flex;
            gap: 12px;
            margin-top: 17px;
            padding: 19px;
            border: 1px solid var(--border);
            border-radius: 13px;
            background: #eee5d9;
        }

        .help-card>i {
            color: var(--brown);
            font-size: 19px;
        }

        .help-card strong {
            font-size: 12px;
        }

        .help-card p {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .toast-message {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 1000;
            max-width: 380px;
            padding: 15px 20px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--paper);
            color: var(--dark-brown);
            box-shadow: 0 10px 30px #00000018;
            opacity: 0;
            pointer-events: none;
            transform: translateY(10px);
            transition: .25s;
        }

        .toast-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 900px) {
            .checkout-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .checkout-sidebar {
                position: static;
            }
        }

        @media (max-width: 560px) {
            .checkout-page {
                padding: 38px 14px 55px;
            }

            .checkout-card {
                padding: 21px 16px;
            }

            .form-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .field.full {
                grid-column: auto;
            }

            .checkout-header h1 {
                font-size: 32px;
            }

            .order-summary {
                padding: 22px 16px;
            }

            .popular {
                display: none;
            }

            .summary-total strong {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <main class="checkout-page">
        <div class="checkout-container">

            <header class="checkout-header">
                <span class="eyebrow">BOOKISH BOOKSTORE</span>
                <h1>Complete Your <span>Order</span></h1>
                <p>One last step before your next great read.</p>

                <nav class="breadcrumb">
                    <a href="{{route('Home') }}">Home</a>
                    <span>/</span>
                    <a href="{{ route('cart.index') }}">Shopping Cart</a>
                    <span>/</span>
                    <strong>Checkout</strong>
                </nav>
            </header>

            <form id="checkout-form" class="checkout-grid" method="post"  action="{{ route('checkout.store') }}">
                @csrf
                <div class="checkout-main">

                    <section class="checkout-card">
                        <div class="section-heading">
                            <div class="section-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div>
                                <h2>Contact Information</h2>
                                <p>How can we reach you?</p>
                            </div>
                            <span class="step">01</span>
                        </div>

                        <div class="form-grid">
                            <div class="field">
                                <label for="first-name">First Name <span>*</span></label>
                                <input id="first-name" name="first_name" type="text"
                                    placeholder="Your first name" autocomplete="given-name" value="{{ old('first_name') }}" >
                                    @error('first_name')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="field">
                                <label for="last-name">Last Name <span>*</span></label>
                                <input id="last-name" name="last_name" type="text"
                                    placeholder="Your last name" autocomplete="family-name"  value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="field">
                                <label for="email">Email Address <span>*</span></label>
                                <input id="email" name="email" type="email"
                                    placeholder="you@example.com" autocomplete="email" value="{{ old('email') }}" >
                                    @error('email')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="field">
                                <label for="phone">Phone Number <span>*</span></label>
                                <input id="phone" name="phone" type="tel"
                                    placeholder="+20 1XX XXX XXXX" autocomplete="tel" value="{{ old('phone') }}" >
                                    @error('phone')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                            </div>
                        </div>
                    </section>

                    <section class="checkout-card">
                        <div class="section-heading">
                            <div class="section-icon">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div>
                                <h2>Shipping Address</h2>
                                <p>Where should we deliver your books?</p>
                            </div>
                            <span class="step">02</span>
                        </div>

                        <div class="form-grid">
                            <div class="field full">
                                <label for="address">Street Address <span>*</span></label>
                                <input id="address" name="address" type="text"
                                    placeholder="House number and street name"
                                    autocomplete="street-address"  value="{{ old('address') }}">
                                     @error('address')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="field">
                                <label for="country">Country <span>*</span></label>
                                <select id="country" name="country" autocomplete="country-name"  >
                                    <option value="">Select country</option>
                                    <option value="Egypt">Egypt</option>
                                </select>
                                @error('country')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="field">
                                <label for="city">City <span>*</span></label>
                                <input id="city" name="city" type="text"
                                    placeholder="Your city" autocomplete="address-level2" value="{{ old('city') }}" >
                                    @error('city')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="field">
                                <label for="postal-code">Postal Code</label>
                                <input id="postal-code" name="postal_code" type="text"
                                    placeholder="Optional" autocomplete="postal-code" value="{{ old('postal_code') }}">
                                    @error('postal_code')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                            </div>

                            <div class="field full">
                                <label for="notes">Order Notes <span class="optional">(Optional)</span></label>
                                <textarea id="notes" name="notes" rows="3"
    placeholder="Special instructions for delivery...">{{ old('notes') }}</textarea>

                                    @error('notes')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror


                            </div>
                        </div>
                    </section>

                    <section class="checkout-card">
                        <div class="section-heading">
                            <div class="section-icon">
                                <i class="fa-regular fa-credit-card"></i>
                            </div>
                            <div>
                                <h2>Payment Method</h2>
                                <p>Choose how you would like to pay.</p>
                            </div>
                            <span class="step">03</span>
                        </div>

                        <div class="payment-options">
                            <label class="payment-option selected">
                                <input type="radio" name="payment_method" value="cash_on_delivery" checked>
                                <span class="payment-icon">
                                    <i class="fa-solid fa-money-bill-wave"></i>
                                </span>
                                <span class="payment-details">
                                    <strong>Cash on Delivery</strong>
                                    <small>Pay when your books arrive.</small>
                                </span>
                                <span class="popular">Popular</span>
                            </label>

                            <label class="payment-option">
                                <input type="radio" name="payment_method" value="kashier">
                                <span class="payment-icon">
                                    <i class="fa-regular fa-credit-card"></i>
                                </span>
                                <span class="payment-details">
                                    <strong>Credit / Debit Card</strong>
                                    <small>Card payment option.</small>
                                </span>

                            </label>
                        </div>
                        @error('payment_method')
                                    <p style="color:red;">.{{ $message }} </p>
                                    @enderror
                        <p class="payment-note">
                            <i class="fa-solid fa-shield-halved"></i>
                            Your payment information should be handled securely.
                        </p>
                    </section>

                </div>

                <aside class="checkout-sidebar">
                    <div class="order-summary">

                        <div class="summary-header">
                            <div>
                                <span class="eyebrow">YOUR SELECTION</span>
                                <h2>Order Summary</h2>
                            </div>
                            <i class="fa-solid fa-book-open"></i>
                        </div>

                        <div class="summary-items">
                            @foreach ($data as $d)
                            <div class="summary-item">
                                <div class="book-cover">

                                    <img
                                        src="{{ asset('assets/Images/' . $d->product->cover) }}"
                                        alt="{{ $d->product->title }}"
                                        width="60"
                                        height="80"
                                        style="object-fit: cover; padding-right: 10px;">

                                </div>
                                <div class="book-info">
                                    <h3>{{ $d->product->title }}</h3>
                                    <p>Quantity: {{$d->quantity }}</p>
                                    <span class="unit-price"> ${{ number_format($d->product->price, 2) }} each</span>
                                </div>
                                <strong class="item-price">${{ number_format($d->product->price * $d->quantity, 2) }}</strong>
                            </div>
                            @endforeach
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-line">
                            <span>Subtotal</span>
                            <strong>${{ number_format($total, 2) }}</strong>
                        </div>

                        <div class="summary-line">
                            <span>Shipping</span>
                            <strong class="shipping-text">Calculated at checkout</strong>
                        </div>

                        <div class="summary-divider"></div>

                        <div class="summary-total">
                            <span>Total</span>
                            <strong>${{ number_format($total, 2) }}</strong>
                        </div>

                        <button type="submit" class="place-order">
                            <span>Place Order</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>

                        <p class="summary-footnote">
                            <i class="fa-solid fa-lock"></i>
                            Review your details before placing your order.
                        </p>

                        <a href="{{ route('cart.index') }}" class="back-to-cart">
                            <i class="fa-solid fa-arrow-left"></i>
                            Return to Shopping Cart
                        </a>

                    </div>


                    <div class="help-card">
                        <i class="fa-regular fa-circle-question"></i>
                        <div>
                            <strong>Need a hand?</strong>
                            <p>We're here to help with your order.</p>
                        </div>
                    </div>
                </aside>

            </form>
        </div>
    </main>

    <div class="toast-message" id="checkout-message" role="status" aria-live="polite"></div>

    <!-- <script>
        const checkoutForm = document.getElementById('checkout-form');
        const checkoutMessage = document.getElementById('checkout-message');
        let messageTimeout;

        checkoutForm.addEventListener('submit', function(event) {
            event.preventDefault();

            if (!checkoutForm.reportValidity()) {
                return;
            }

            checkoutMessage.textContent =
                'This is a front-end demo. Order submission is not connected yet.';

            checkoutMessage.classList.add('show');

            clearTimeout(messageTimeout);

            messageTimeout = setTimeout(() => {
                checkoutMessage.classList.remove('show');
            }, 3500);
        });

        document.querySelectorAll('input[name="payment_method"]').forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('.payment-option').forEach(option => {
                    option.classList.remove('selected');
                });

                this.closest('.payment-option').classList.add('selected');
            });
        });
    </script> -->

</body>

</html>
