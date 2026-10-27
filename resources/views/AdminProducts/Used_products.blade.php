@extends('Admin_sidebar_layout')
<head>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/Elegant Brown B Book Logo Icon.png') }}">
</head>
@section('title','Products')

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
            --border-color: #e7d8c5
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--text-dark);
            font-family: 'DM Sans', sans-serif
        }


        .topbar {
            position: fixed;
            top: 0;
            left: 248px;
            right: 0;
            height: 73px;
            z-index: 900;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            background: rgba(255, 250, 242, .97);
            border-bottom: 1px solid var(--border-color)
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text-muted);
            font-size: 13px
        }

        .topbar-left i {
            color: var(--wood)
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 23px
        }

        .icon-button {
            position: relative;
            border: 0;
            background: none;
            color: var(--wood);
            font-size: 18px
        }

        .notification-dot {
            position: absolute;
            top: 0;
            right: -2px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--gold)
        }

        .top-divider {
            width: 1px;
            height: 30px;
            background: var(--border-color)
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 700
        }

        .admin-avatar {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: white;
            background: linear-gradient(145deg, #d7b78d, #76503a)
        }

        .menu-toggle {
            display: none;
            border: 0;
            background: none;
            color: var(--wood-dark);
            font-size: 21px
        }

        .main-content {
            margin-left: 248px;
            min-height: 100vh;
            padding: 108px 38px 40px
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px
        }

        .page-heading h1 {
            margin: 0 0 5px;
            color: var(--wood-dark);
            font-family: 'Playfair Display', serif;
            font-size: 39px;
            font-weight: 700
        }

        .page-heading p {
            margin: 0;
            color: var(--text-muted);
            font-size: 14px
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 47px;
            padding: 0 19px;
            border: 1px solid var(--wood);
            border-radius: 10px;
            background: var(--wood);
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            transition: .2s
        }

        .btn-add:hover {
            background: var(--wood-dark);
            color: #fff
        }

        .table-card {
            padding: 23px 20px 18px;
            background: var(--paper);
            border: 1px solid #ebdfd0;
            border-radius: 15px;
            box-shadow: 0 15px 45px #5538200c
        }

        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin: 0 8px 17px
        }

        .search-wrap {
            position: relative;
            width: min(360px, 100%)
        }

        .search-wrap i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--wood)
        }

        .search-input {
            width: 100%;
            height: 43px;
            padding: 0 14px 0 42px;
            border: 1px solid var(--border-color);
            border-radius: 9px;
            outline: none;
            background: #fffdf9;
            color: var(--text-dark);
            font-size: 13px
        }

        .search-input:focus,
        .filter-select:focus {
            border-color: var(--wood-light)
        }

        .filter-select {
            height: 43px;
            min-width: 190px;
            padding: 0 13px;
            border: 1px solid var(--border-color);
            border-radius: 9px;
            background: #fffdf9;
            color: var(--text-dark);
            font-size: 13px;
            outline: none
        }

        .table-responsive {
            overflow-x: auto
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap
        }

        thead {
            background: #f3eadc
        }

        th {
            padding: 13px 12px;
            color: #765039;
            font-size: 12px;
            font-weight: 700;
            text-align: left
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #efe5d8;
            vertical-align: middle;
            font-size: 13px
        }

        tbody tr:hover {
            background: #fdf6eb
        }

        tbody tr:last-child td {
            border-bottom: 0
        }

        .number-cell {
            width: 42px;
            color: var(--wood);
            text-align: center
        }

        .book-cover {
            width: 42px;
            height: 61px;
            object-fit: cover;
            border-radius: 4px;
            box-shadow: 0 3px 8px #38231620;
            background: #eee0ce
        }

        .book-title {
            display: block;
            color: var(--wood-dark);
            font-weight: 700;
            font-size: 13px
        }

        .book-author {
            display: block;
            margin-top: 4px;
            color: var(--text-muted);
            font-size: 11px
        }

        .category-badge,
        .condition-badge,
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600
        }

        .category-badge {
            background: #efe1ce;
            color: #68432e
        }

        .category-badge.blue {
            background: #dce9fa;
            color: #234e85
        }

        .category-badge.purple {
            background: #e9e0f5;
            color: #563a84
        }

        .category-badge.green {
            background: #dcefe2;
            color: #246644
        }

        .category-badge.rose {
            background: #f9ded8;
            color: #8b4130
        }

        .condition-badge {
            background: #eee2d4;
            color: #68432e
        }

        .condition-badge.good {
            background: #ffebbd;
            color: #85530c
        }

        .condition-badge.new {
            background: #dce9fa;
            color: #234e85
        }

        .status-badge {
            gap: 6px;
            background: #ddf3e4;
            color: #16804b;
            border-radius: 30px
        }

        .status-badge i {
            font-size: 7px
        }

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px
        }

        .btn-edit,
        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 33px;
            padding: 0 12px;
            border: 0;
            border-radius: 7px;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            transition: .2s
        }

        .btn-edit {
            background: var(--wood)
        }

        .btn-edit:hover {
            background: var(--wood-dark)
        }

        .btn-delete {
            background: #e85d5d
        }

        .btn-delete:hover {
            background: #c83f3f
        }

        .empty-state {
            padding: 45px 15px;
            text-align: center;
            color: var(--text-muted)
        }

        .empty-state i {
            display: block;
            margin-bottom: 12px;
            color: #c8ad8c;
            font-size: 30px
        }

        .table-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 17px 8px 0;
            border-top: 1px solid #efe5d8;
            color: var(--text-muted);
            font-size: 12px
        }

        .pagination {
            display: flex;
            gap: 7px;
            margin: 0
        }

        .page-btn {
            width: 34px;
            height: 34px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: #fffaf2;
            color: var(--wood);
            font-size: 12px
        }

        .page-btn.active {
            border-color: var(--wood);
            background: var(--wood);
            color: #fff
        }

        .page-btn:disabled {
            opacity: .45;
            cursor: not-allowed
        }

        .mobile-hint {
            display: none;
            color: var(--text-muted);
            font-size: 11px;
            margin: 0 8px 10px
        }

        .modal-backdrop-custom {
            position: fixed;
            inset: 0;
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #20140f8c
        }

        .confirm-modal {
            width: min(420px, 100%);
            padding: 27px;
            border-radius: 16px;
            background: var(--paper);
            box-shadow: 0 20px 60px #0003
        }

        .confirm-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            margin-bottom: 16px;
            border-radius: 50%;
            background: #ffe3df;
            color: #c83f3f;
            font-size: 20px
        }

        .confirm-modal h2 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: var(--wood-dark)
        }

        .confirm-modal p {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 23px
        }

        @media(max-width:1200px) {
            .sidebar {
                width: 220px
            }

            .topbar {
                left: 220px
            }

            .main-content {
                margin-left: 220px;
                padding-left: 24px;
                padding-right: 24px
            }

            .table-card {
                padding: 18px 13px
            }

            .toolbar {
                margin-left: 5px;
                margin-right: 5px
            }

            th,
            td {
                padding: 11px 9px
            }
        }

        @media(max-width:850px) {
            .sidebar {
                width: 248px;
                transform: translateX(-100%)
            }

            .sidebar.open {
                transform: translateX(0)
            }

            .topbar {
                left: 0;
                height: 65px;
                padding: 0 18px
            }

            .menu-toggle {
                display: inline-block
            }

            .topbar-left {
                margin-right: auto;
                margin-left: 14px
            }

            .main-content {
                margin-left: 0;
                padding: 91px 18px 28px
            }

            .page-heading h1 {
                font-size: 34px
            }

            .mobile-hint {
                display: block
            }

            .table-card {
                padding: 16px 12px
            }

            .toolbar {
                align-items: stretch;
                flex-direction: column
            }

            .search-wrap {
                width: 100%
            }

            .filter-select {
                width: 100%
            }
        }

        @media(max-width:560px) {
            .main-content {
                padding: 85px 11px 24px
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column
            }

            .page-heading h1 {
                font-size: 31px
            }

            .page-heading p {
                font-size: 13px;
                line-height: 1.6
            }

            .btn-add {
                width: 100%
            }

            .topbar {
                padding: 0 12px
            }

            .topbar-left {
                font-size: 12px
            }

            .topbar-right {
                gap: 12px
            }

            .admin-profile {
                gap: 6px;
                font-size: 12px
            }

            .admin-avatar {
                width: 33px;
                height: 33px
            }

            .top-divider {
                display: none
            }

            .table-footer {
                align-items: flex-start;
                flex-direction: column
            }

            .table-card {
                border-radius: 12px
            }

            .pagination {
                align-self: flex-end
            }
        }
    </style>
</head>

<body>
    <main class="main-content">
        <div class="page-heading">
            <div>
                <h1>Second Hand Products</h1>
                <p>Manage your book inventory. Edit or remove products from your store.</p>
            </div><a href="{{ route('Add_product') }}" class="btn-add"><i class="fa-solid fa-circle-plus"></i> Add New
                Product</a>
        </div>
                  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
        <section class="table-card">
            <div class="toolbar">
                <div class="search-wrap"><i class="fa-solid fa-magnifying-glass"></i><input id="searchInput"
                        class="search-input" type="search" placeholder="Search for a book or author..."
                        aria-label="Search products"></div><select id="categoryFilter" class="filter-select"
                    aria-label="Filter by category">
                    <option value="">All Categories</option>
                    <option>Fiction</option>
                    <option>Science Fiction</option>
                    <option>Dystopian</option>
                    <option>Self Development</option>
                    <option>Fantasy</option>
                    <option>Romance</option>
                    <option>History</option>
                    <option>Technology</option>
                </select>
            </div>
            <p class="mobile-hint"><i class="fa-solid fa-arrows-left-right me-1"></i> Swipe horizontally to see all
                product details.</p>
            <div class="table-responsive">

                @if (session('Delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('Delete') }}
    </div>
@endif
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price (USD)</th>
                            <th>Stock</th>
                            <th>Condition</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productRows">
                        @foreach ($data as $d)


                        <tr>
    <td class="number-cell">{{ $loop->iteration }}</td>
    <td>
        <img
            class="book-cover"
            src="{{ asset('assets/images/'.$d->cover) }}"
            alt="{{ $d->title }}"
            loading="lazy"
        >
    </td>
    <td>
        <span class="book-title">{{ $d->title }}</span>
        <span class="book-author">{{ $d->author }}</span>
    </td>
    <td>
        <span class="category-badge">{{ $d->category }}</span>
    </td>
    <td>{{ $d->price }}</td>
    <td>{{ $d->stock }}</td>
    <td>
        <span class="condition-badge">{{ $d->condition }}</span>
    </td>
    <td>
        <span class="status-badge">{{ $d->status }}</span>
    </td>
    <td>
        <div class="action-group">
            <button
                class="btn-edit"
                data-edit="1"
                aria-label="Edit The Alchemist"
            >
              <a class="btn-edit" href="{{route('Edit_product',$d->id) }}"> Edit </a>
            </button>
            <button
                class="btn-delete"
                data-delete="1"
                aria-label="Delete The Alchemist"
            >
                <a class="btn-delete" href="{{route('delete_product',$d->id) }}"> Delete </a>
            </button>
        </div>
    </td>
</tr>
@endforeach
                    </tbody>
                </table>
                <div class="empty-state" id="emptyState" hidden><i class="fa-solid fa-book-open"></i><strong>No books
                        found</strong>
                    <div class="mt-1">Try another search or category.</div>
                </div>
            </div>
            <div class="table-footer"><span id="resultsCount">Showing products</span>
                <div class="pagination" id="pagination"></div>
            </div>
        </section>
    </main>
    @endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

$(document).ready(function () {
    $('#searchInput').on('input', function () {
        let search = $(this).val();

        $.ajax({
            url: '{{ route("admin.products.search") }}',
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                search: search
            },
            success: function (products) {
                let rows = '';

                products.forEach(function (product, index) {
                    rows += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>
                                <img
                                    class="book-cover"
                                    src="{{ asset('assets/images') }}/${product.cover}"
                                    alt="${product.title}"
                                >
                            </td>
                            <td>
                                <span class="book-title">${product.title}</span>
                                <span class="book-author">${product.author}</span>
                            </td>
                            <td>${product.category}</td>
                            <td>${product.price}</td>
                            <td>${product.stock}</td>
                            <td>${product.condition}</td>
                            <td>${product.status}</td>
                        </tr>
                    `;
                });

                $('#productRows').html(rows);
                $('#emptyState').prop('hidden', products.length > 0);
                $('#resultsCount').text('Showing ' + products.length + ' products');
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

</script>
</body>

</html>
