
@extends('layout')

@section('content')

<style>
    .thankyou-page {
        background: #faf9f5;
        color: #123c32;
        padding: 65px 20px 75px;
        min-height: 600px;
        text-align: center;
    }

    .thankyou-container {
        max-width: 850px;
        margin: auto;
    }

    .success-icon {
        width: 85px;
        height: 85px;
        margin: 0 auto 25px;
        border-radius: 50%;
        background: #17594a;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 45px;
        box-shadow: 0 8px 25px rgba(23, 89, 74, 0.15);
    }

    .thankyou-illustration {
        font-size: 55px;
        margin-bottom: 15px;
    }

    .thankyou-page h1 {
        font-family: Georgia, serif;
        font-size: clamp(38px, 5vw, 52px);
        font-weight: 700;
        margin-bottom: 12px;
        color: #123c32;
    }

    .thankyou-subtitle {
        font-size: 21px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .thankyou-description {
        max-width: 560px;
        margin: 0 auto 30px;
        color: #6b807b;
        line-height: 1.8;
    }

    .order-info {
        max-width: 620px;
        margin: 30px auto;
        padding: 25px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        background: #eef1eb;
        border-radius: 15px;
        text-align: left;
    }

    .order-info-item {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 5px 10px;
    }

    .order-info-item + .order-info-item {
        border-left: 1px solid #c9d4cd;
    }

    .order-info-icon {
        font-size: 27px;
        color: #17594a;
    }

    .order-info-label {
        color: #647973;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .order-info-value {
        font-weight: 700;
        font-size: 16px;
        overflow-wrap: anywhere;
    }

    .thankyou-actions {
        display: flex;
        justify-content: center;
        gap: 18px;
        margin-top: 28px;
        flex-wrap: wrap;
    }

    .thankyou-btn {
        display: inline-block;
        min-width: 235px;
        padding: 15px 25px;
        border: 1px solid #17594a;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.25s ease;
    }

    .thankyou-btn-primary {
        color: #fff;
        background: #124638;
    }

    .thankyou-btn-primary:hover {
        color: #fff;
        background: #0c352b;
        transform: translateY(-2px);
    }

    .thankyou-btn-secondary {
        color: #124638;
        background: transparent;
    }

    .thankyou-btn-secondary:hover {
        background: #eef1eb;
        color: #124638;
        transform: translateY(-2px);
    }

    .thankyou-benefits {
        background: #f0f2ed;
        padding: 28px 20px;
    }

    .thankyou-benefits-inner {
        max-width: 1200px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }

    .benefit-item {
        display: flex;
        align-items: center;
        gap: 13px;
        justify-content: center;
    }

    .benefit-icon {
        font-size: 27px;
    }

    .benefit-item strong {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .benefit-item small {
        color: #71827c;
        font-size: 12px;
    }

    @media (max-width: 768px) {
        .thankyou-page {
            padding: 45px 18px;
        }

        .order-info {
            grid-template-columns: 1fr;
            padding: 18px;
        }

        .order-info-item + .order-info-item {
            border-left: none;
            border-top: 1px solid #c9d4cd;
            padding-top: 18px;
        }

        .thankyou-benefits-inner {
            grid-template-columns: repeat(2, 1fr);
        }

        .thankyou-btn {
            width: 100%;
        }
    }

    @media (max-width: 420px) {
        .thankyou-benefits-inner {
            grid-template-columns: 1fr;
        }

        .benefit-item {
            justify-content: flex-start;
        }
    }
</style>

<section class="thankyou-page">
    <div class="thankyou-container">

        <div class="thankyou-illustration" aria-hidden="true">
            📚
        </div>

        <div class="success-icon" aria-label="Success">
            ✓
        </div>

        <h1>Thank You!</h1>

        <p class="thankyou-subtitle">
            Your order has been placed successfully.
        </p>

        <p class="thankyou-description">
            We really appreciate your trust in Bookish.
            Your order is being processed, and we're looking forward
            to getting your books to you.
        </p>

        <div class="order-info">

            <div class="order-info-item">
                <div class="order-info-icon">
                    <i class="fa-solid fa-receipt"></i>
                </div>

                <div>
                    <div class="order-info-label">Order Number</div>
                    <div class="order-info-value">
                        #BK-{{ $order->id }}
                    </div>
                </div>
            </div>

            <div class="order-info-item">
                <div class="order-info-icon">
                    <i class="fa-regular fa-calendar"></i>
                </div>

                <div>
                    <div class="order-info-label">Order Date</div>
                    <div class="order-info-value">
                        {{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}
                    </div>
                </div>
            </div>

            <div class="order-info-item">
                <div class="order-info-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <div>
                    <div class="order-info-label">Total Amount</div>
                    <div class="order-info-value">
                        {{ number_format($order->total_price, 2) }}
                        EGP
                    </div>
                </div>
            </div>

            <div class="order-info-item">
                <div class="order-info-icon">
                    <i class="fa-solid fa-box"></i>
                </div>

                <div>
                    <div class="order-info-label">Order Status</div>
                    <div class="order-info-value">
                        Order Received
                    </div>
                </div>
            </div>

        </div>

        <div class="thankyou-actions">
            <a href="{{ route('shop') }}"
               class="thankyou-btn thankyou-btn-primary">
                Continue Shopping
            </a>

            <a href="{{ route('my.orders') }}"
               class="thankyou-btn thankyou-btn-secondary">
                View My Orders
            </a>
        </div>

    </div>
</section>

<section class="thankyou-benefits">
    <div class="thankyou-benefits-inner">

        <div class="benefit-item">
            <div class="benefit-icon">
                <i class="fa-solid fa-truck-fast"></i>
            </div>
            <div>
                <strong>Fast & Reliable Shipping</strong>
                <small>Your books delivered safely</small>
            </div>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div>
                <strong>Secure Payments</strong>
                <small>Your information is always safe</small>
            </div>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">
                <i class="fa-solid fa-headset"></i>
            </div>
            <div>
                <strong>Customer Support</strong>
                <small>We're here to help anytime</small>
            </div>
        </div>

        <div class="benefit-item">
            <div class="benefit-icon">
                <i class="fa-solid fa-leaf"></i>
            </div>
            <div>
                <strong>A Greener Tomorrow</strong>
                <small>More books, less waste</small>
            </div>
        </div>

    </div>
</section>

@endsection
