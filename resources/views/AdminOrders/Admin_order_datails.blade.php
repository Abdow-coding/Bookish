    @extends('Admin_sidebar_layout')
    @section('title',"Orders")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('content')
    <style>
        :root {
            --wood-dark: #3e261b;
            --wood: #68432e;
            --wood-light: #916744;
            --gold: #d5aa63;
            --cream: #f7f0e5;
            --paper: #fffaf2;
            --text-dark: #35251d;
            --text-muted: #796b60;
            --border-color: #e7d8c5;
        }

        .status-dropdown {
            border: none;
            outline: none;
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        .status-dropdown.pending {
            background-color: #fff0d9;
            color: #c77716;
        }

        .status-dropdown.completed {
            background-color: #dcfce7;
            color: #15803d;
        }

        .orders-page {
            margin-left: 248px;
            min-height: 100vh;
            padding: 108px 15px 40px;
            background: var(--cream);
            color: var(--text-dark);
            font-family: 'DM Sans', sans-serif;
            box-sizing: border-box;
        }

        .orders-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .orders-subtitle {
            color: var(--wood-light);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .orders-header h1 {
            margin: 0 0 5px;
            color: var(--wood-dark);
            font-family: 'Playfair Display', serif;
            font-size: 39px;
            font-weight: 700;
        }

        .orders-header p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        .orders-count {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background: var(--paper);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--wood);
            font-size: 13px;
        }

        .orders-card {
            width: 100%;
            background: var(--paper);
            border: 1px solid #ebdfd0;
            border-radius: 15px;
            box-shadow: 0 15px 45px #5538200c;
            overflow: hidden;
        }

        .orders-card-header {
            padding: 23px 20px 17px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .orders-card-header h2 {
            margin: 0;
            color: var(--wood-dark);
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
        }

        .orders-search {
            display: flex;
            align-items: center;
            gap: 10px;
            width: min(360px, 100%);
            padding: 0 14px;
            height: 43px;
            background: #fffdf9;
            border: 1px solid var(--border-color);
            border-radius: 9px;
            color: var(--wood);
        }

        .orders-search input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: none;
            background: transparent;
            color: var(--text-dark);
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
        }

        .orders-search:focus-within {
            border-color: var(--wood-light);
        }

        .orders-table {
            width: 100%;
            margin: 0;
            white-space: nowrap;
            border-collapse: collapse;
        }

        .orders-table thead {
            background: #f3eadc;
        }

        .orders-table thead th {
            padding: 13px 12px;
            color: #765039;
            font-size: 12px;
            font-weight: 700;
            text-align: left;
            text-transform: none;
            letter-spacing: 0;
            border-bottom: 1px solid var(--border-color);
        }

        .orders-table tbody td {
            padding: 14px 12px;
            vertical-align: middle;
            color: var(--text-muted);
            font-size: 13px;
            border-bottom: 1px solid #efe5d8;
        }

        .orders-table tbody tr:hover {
            background: #fdf6eb;
        }

        .orders-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .order-id {
            color: var(--wood);
            font-weight: 700;
        }

        .customer-name {
            color: var(--wood-dark);
            font-weight: 700;
        }

        .order-price {
            color: var(--wood-dark) !important;
            font-weight: 700;
        }

        .order-price small {
            color: var(--text-muted);
            font-weight: 400;
        }

        .view-order-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 33px;
            padding: 0 12px;
            border: 1px solid var(--wood);
            border-radius: 7px;
            background: var(--wood);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            transition: .2s;
        }

        .view-order-btn:hover {
            background: var(--wood-dark);
            border-color: var(--wood-dark);
            color: #fff;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 30px;
            background: #ddf3e4;
            color: #16804b;
            font-size: 11px;
            font-weight: 600;
        }

        .orders-card .table-responsive {
            overflow-x: auto;
        }

        .orders-card>.p-3 {
            padding: 17px 20px !important;
            border-top: 1px solid #efe5d8;
            background: var(--paper);
        }

        .order-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #20140f8c;
        }

        .order-modal.show {
            display: flex;
        }

        .order-modal-content {
            width: min(650px, 100%);
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 16px;
            background: var(--paper);
            box-shadow: 0 20px 60px #0003;
        }

        .modal-header-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px;
            border-bottom: 1px solid var(--border-color);
        }

        .modal-header-custom h2 {
            margin: 8px 0 0;
            color: var(--wood-dark);
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
        }

        .modal-close {
            width: 35px;
            height: 35px;
            border: 0;
            border-radius: 50%;
            background: #f3eadc;
            color: var(--wood);
            font-size: 25px;
            cursor: pointer;
        }

        .modal-body-custom {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
            padding: 24px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 7px;
            min-width: 0;
        }

        .detail-item span {
            color: var(--text-muted);
            font-size: 12px;
        }

        .detail-item strong {
            overflow-wrap: anywhere;
            color: var(--wood-dark);
            font-size: 14px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .modal-total {
            grid-column: 1 / -1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px;
            border-radius: 10px;
            background: #f3eadc;
            color: var(--wood);
        }

        .modal-total strong {
            font-size: 19px;
        }

        @media (max-width: 1200px) {
            .orders-page {
                padding-right: 15px;
                padding-left: 15px;
            }

            .orders-card-header {
                padding-right: 15px;
                padding-left: 15px;
            }

            .orders-table thead th,
            .orders-table tbody td {
                padding: 11px 9px;
            }
        }

        @media (max-width: 850px) {
            .orders-page {
                margin-left: 0;
                padding: 91px 18px 28px;
            }

            .orders-header h1 {
                font-size: 34px;
            }
        }

        @media (max-width: 768px) {

            .orders-header,
            .orders-card-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .orders-search {
                width: 100%;
            }

            .modal-body-custom {
                grid-template-columns: 1fr;
            }

            .full-width,
            .modal-total {
                grid-column: auto;
            }
        }

        @media (max-width: 560px) {
            .orders-page {
                padding: 85px 11px 24px;
            }

            .orders-header h1 {
                font-size: 31px;
            }

            .orders-header p {
                font-size: 13px;
                line-height: 1.6;
            }

            .orders-card {
                border-radius: 12px;
            }

            .orders-card-header {
                padding: 16px 12px;
            }

            .orders-table thead th,
            .orders-table tbody td {
                padding: 11px 9px;
            }

            .modal-body-custom {
                padding: 18px;
            }
        }

        .payment-status {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .payment-status.paid,
        .payment-status.success {
            background: #dcfce7;
            color: #15803d;
        }

        .payment-status.pending {
            background: #fff0d9;
            color: #c77716;
        }

        .payment-status.failed,
        .payment-status.cancelled {
            background: #fee2e2;
            color: #b91c1c;
        }

        .payment-status.unknown {
            background: #eee7df;
            color: #796b60;
        }
    </style>
    <main class="orders-page">
        <header class="orders-header">
            <div>
                <span class="orders-subtitle">BOOKISH ADMIN</span>
                <h1>Orders Management</h1>
                <p>Manage and review customer orders.</p>
            </div>
        </header>

        <section class="orders-card">
            <div class="orders-card-header">
                <h2>Recent Orders</h2>
                <label class="orders-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" id="orderSearch" placeholder="Search orders..." aria-label="Search orders">
                </label>
            </div>
            <div class="table-responsive">
                <table class="table orders-table" id="ordersTable">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>User Id</th>
                            <th>Products</th>
                            <th>quantity</th>
                            <th>Total Price</th>
                            <th>Date</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d )
                        @foreach ($d->items as $order )
                        <tr data-order-id="{{$d->id}}" data-customer=" {{ $d->first_name }} {{ $d->last_name }}" data-phone="{{ $d->phone }}" data-total="{{ number_format($d->total_price) }}" data-date=" {{ \Carbon\Carbon::parse($d->order_date)->format('Y-m-d') }}" data-governorate="{{ $d->country }}" data-city="{{ $d->city }}" data-address="{{ $d->address }}" data-notes="{{ $d->notes }}." data-status="{{ $d->status }}" data-payment-method="{{ $d->payment_method }}">
                            <td><span class="order-id">#{{$d->id}}</span></td>
                            <td><span class="order-id">#{{$d->user_id}}</span></td>
                            <td><span class="customer-name">{{ $order->product->title }}</span></td>
                            <td>{{ $order->quantity }}</td>
                            <td class="order-price">{{ number_format($d->total_price) }} <small>$</small></td>
                            <td> {{ \Carbon\Carbon::parse($d->order_date)->format('Y-m-d') }}</td>
                            <td>
                                <select
                                    class="status-dropdown {{ strtolower($d->status) }}"
                                    data-order-id="{{ $d->id }}"
                                    data-status-url="{{ route('admin.orders.updateStatus', $d->id) }}">

                                    <option value="pending"
                                        {{ strtolower($d->status) === 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="processing"
                                        {{ strtolower($d->status) === 'processing' ? 'selected' : '' }}>
                                        Processing
                                    </option>

                                    <option value="completed"
                                        {{ strtolower($d->status) === 'completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>
                                </select>
                            </td>
                            <td>
                                @php
                                $paymentStatus = strtolower($d->payment_status ?? 'unknown');
                                @endphp

                                <span class="payment-status {{ $paymentStatus }}">
                                    {{ $d->payment_status
            ? ucfirst(str_replace('_', ' ', $d->payment_status))
            : 'N/A' }}
                                </span>
                            </td>
                            <td><button class="view-order-btn" type="button"><i class="fa-regular fa-eye"></i> View Details</button></td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <div class="order-modal" id="orderModal" role="dialog" aria-modal="true" aria-labelledby="modalOrderTitle">
        <section class="order-modal-content">
            <header class="modal-header-custom">
                <div><span class="orders-subtitle">ORDER INFORMATION</span>
                    <h2 id="modalOrderTitle">Order Details</h2>
                </div>
                <button type="button" class="modal-close" id="closeOrderModal" aria-label="Close">&times;</button>
            </header>
            <div class="modal-body-custom">
                <div class="detail-item"><span>Customer</span><strong id="modalCustomer"></strong></div>
                <div class="detail-item"><span>Phone</span><strong id="modalPhone"></strong></div>
                <div class="detail-item"><span>Order Date</span><strong id="modalDate"></strong></div>
                <div class="detail-item"><span>Status</span><strong id="modalStatus"></strong></div>
                <div class="detail-item"><span>Governorate</span><strong id="modalGovernorate"></strong></div>
                <div class="detail-item"><span>City</span><strong id="modalCity"></strong></div>
                <div class="detail-item full-width"><span>Address</span><strong id="modalAddress"></strong></div>
                <div class="detail-item full-width"><span>Payment Method</span><strong id="modalPaymentMethod"></strong></div>
                <div class="detail-item full-width"><span>Notes</span><strong id="modalNotes"></strong></div>
                <div class="modal-total"><span>Total Amount</span><strong><span id="modalTotal"></span> EGP</strong></div>
            </div>
        </section>
    </div>


    <script>
        const modal = document.getElementById('orderModal');

        const fields = {
            orderId: 'modalOrderTitle',
            customer: 'modalCustomer',
            phone: 'modalPhone',
            date: 'modalDate',
            status: 'modalStatus',
            governorate: 'modalGovernorate',
            city: 'modalCity',
            address: 'modalAddress',
            notes: 'modalNotes',
            total: 'modalTotal',
            paymentMethod: 'modalPaymentMethod'
        };

        document.querySelectorAll('.view-order-btn').forEach(button => {
            button.addEventListener('click', () => {
                const row = button.closest('tr');
                const data = row.dataset;

                document.getElementById(fields.orderId).textContent =
                    'Order #' + (data.orderId || 'N/A');

                Object.entries(fields).forEach(([key, id]) => {
                    if (key === 'orderId') return;

                    const element = document.getElementById(id);

                    if (element) {
                        element.textContent = data[key] || 'N/A';
                    }
                });

                modal.classList.add('show');
            });
        });

        function closeModal() {
            modal.classList.remove('show');
        }

        document.getElementById('closeOrderModal')
            .addEventListener('click', closeModal);

        modal.addEventListener('click', event => {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', event => {
            if (event.key === 'Escape') {
                closeModal();
            }
        });

        document.getElementById('orderSearch')
            .addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();

                document.querySelectorAll('#ordersTable tbody tr')
                    .forEach(row => {
                        row.style.display = row.textContent
                            .toLowerCase()
                            .includes(query) ? '' : 'none';
                    });
            });



        document.querySelectorAll('.status-dropdown').forEach(select => {
            select.dataset.previousStatus = select.value;

            select.addEventListener('change', async function() {
                const orderId = this.dataset.orderId;
                const previousStatus = this.dataset.previousStatus;
                const newStatus = this.value;

                this.disabled = true;

                try {
                    const response = await fetch(this.dataset.statusUrl, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content
                        },
                        body: JSON.stringify({
                            status: newStatus
                        })
                    });

                    const responseText = await response.text();

                    if (!response.ok) {
                        console.error('HTTP Status:', response.status);
                        console.error('Server Response:', responseText);

                        throw new Error(
                            `Request failed: ${response.status}. Check Console.`
                        );
                    }

                    const result = JSON.parse(responseText);

                    if (!result.success) {
                        throw new Error(result.message || 'Update failed');
                    }

                    this.dataset.previousStatus = result.status;
updateStatusColor(this);

// Update payment status immediately
if (result.payment_status) {
    const orderRows = document.querySelectorAll(
        '#ordersTable tbody tr'
    );

    orderRows.forEach(row => {
        if (row.dataset.orderId === String(orderId)) {
            const paymentStatusElement = row.querySelector('.payment-status');

            if (paymentStatusElement) {
                const paymentStatus = result.payment_status.toLowerCase();

                paymentStatusElement.className =
                    'payment-status ' + paymentStatus;

                paymentStatusElement.textContent =
                    paymentStatus.charAt(0).toUpperCase() +
                    paymentStatus.slice(1).replaceAll('_', ' ');
            }
        }
    });
}

                } catch (error) {
                    this.value = previousStatus;
                    updateStatusColor(this);
                    console.error('Status update error:', error);
                    alert(error.message);

                } finally {
                    this.disabled = false;
                }
            });

            updateStatusColor(select);
        });

        function updateStatusColor(select) {
            select.classList.remove('pending', 'completed');
            select.classList.add(select.value);
        }
    </script>

    @endsection
