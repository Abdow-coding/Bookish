
@extends('layout')

@section('title', 'My Orders')

@section('content')
<style>
    :root {
        --wood-dark: #3e261b;
        --wood: #68432e;
        --wood-light: #916744;
        --cream: #f7f0e5;
        --paper: #fffaf2;
        --text-dark: #35251d;
        --text-muted: #796b60;
        --border-color: #e7d8c5;
    }

    .my-orders-page {
        min-height: 100vh;
        padding: 110px 24px 60px;
        background: var(--cream);
        color: var(--text-dark);
        font-family: 'DM Sans', sans-serif;
    }

    .my-orders-container {
        width: min(1200px, 100%);
        margin: auto;
    }

    .orders-subtitle {
        color: var(--wood-light);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
    }

    .orders-header {
        margin-bottom: 30px;
    }

    .orders-header h1 {
        margin: 8px 0;
        color: var(--wood-dark);
        font-family: 'Playfair Display', serif;
        font-size: 40px;
        font-weight: 700;
    }

    .orders-header p {
        color: var(--text-muted);
        font-size: 14px;
    }

    .orders-card {
        overflow: hidden;
        background: var(--paper);
        border: 1px solid #ebdfd0;
        border-radius: 15px;
        box-shadow: 0 15px 45px #5538200c;
    }

    .orders-card-header {
        padding: 22px;
        border-bottom: 1px solid var(--border-color);
    }

    .orders-card-header h2 {
        margin: 0;
        color: var(--wood-dark);
        font-family: 'Playfair Display', serif;
        font-size: 21px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .orders-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
        white-space: nowrap;
    }

    .orders-table thead {
        background: #f3eadc;
    }

    .orders-table th {
        padding: 15px;
        color: #765039;
        font-size: 12px;
        text-align: left;
    }

    .orders-table td {
        padding: 16px 15px;
        color: var(--text-muted);
        font-size: 13px;
        border-bottom: 1px solid #efe5d8;
        vertical-align: middle;
    }

    .orders-table tbody tr:hover {
        background: #fdf6eb;
    }

    .order-id,
    .book-title {
        color: var(--wood-dark);
        font-weight: 700;
    }

    .order-price {
        color: var(--wood-dark) !important;
        font-weight: 700;
    }

    .status-badge {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-badge.pending {
        background: #fff0d9;
        color: #c77716;
    }

    .status-badge.completed {
        background: #dcfce7;
        color: #15803d;
    }

    .empty-orders {
        padding: 55px 20px;
        text-align: center;
    }

    .empty-orders i {
        margin-bottom: 15px;
        color: var(--wood-light);
        font-size: 42px;
    }

    .empty-orders h3 {
        color: var(--wood-dark);
        font-family: 'Playfair Display', serif;
    }

    .empty-orders p {
        color: var(--text-muted);
    }

    .shop-link {
        display: inline-block;
        margin-top: 10px;
        padding: 11px 22px;
        border-radius: 7px;
        background: var(--wood);
        color: white;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s;
    }

    .shop-link:hover {
        background: var(--wood-dark);
        color: white;
    }

    @media (max-width: 600px) {
        .my-orders-page {
            padding: 90px 12px 35px;
        }

        .orders-header h1 {
            font-size: 32px;
        }

        .orders-card-header {
            padding: 17px;
        }

        .orders-table th,
        .orders-table td {
            padding: 12px 10px;
        }
    }
</style>

<main class="my-orders-page">
    <div class="my-orders-container">

        <header class="orders-header">
            <span class="orders-subtitle">BOOKISH</span>
            <h1>My Orders</h1>
            <p>Track your orders and check their current status.</p>
        </header>

        <section class="orders-card">
            <div class="orders-card-header">
                <h2>Your Orders</h2>
            </div>

            @if($data->isEmpty())
                <div class="empty-orders">
                    <i class="fa-solid fa-book-open"></i>
                    <h3>No Orders Yet</h3>
                    <p>You haven't placed any orders yet.</p>

                    <a href="{{ route('shop') }}" class="shop-link">
                        Browse Books
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Book</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $order)
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>
                                            <span class="order-id">
                                                #{{ $order->id }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="book-title">
                                                {{ $item->product->title ?? 'Book unavailable' }}
                                            </span>
                                        </td>

                                        <td>{{ $item->quantity }}</td>

                                        <td class="order-price">
                                            {{ number_format($order->total_price, 2) }} EGP
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}
                                        </td>

                                        <td>
                                            <span class="status-badge {{ $order->status }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>

    </div>
</main>
@endsection
