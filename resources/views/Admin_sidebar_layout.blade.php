<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/Elegant Brown B Book Logo Icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">




<style>

.admin-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    padding: 18px 10px;
    display: flex;
    flex-direction: column;
    background: linear-gradient(180deg, #43291c, #563721);
    color: #fff;
    z-index: 1000;
}

.sidebar-brand {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 9px 28px;
    color: #e5b15d;
    font-size: 25px;
    font-weight: 800;
    text-decoration: none;
}

.sidebar-brand i {
    font-size: 27px;
}

.sidebar-nav,
.sidebar-bottom {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.sidebar-link {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 14px 15px;
    border: 1px solid transparent;
    border-radius: 12px;
    color: #f8eee2;
    font-size: 13px;
    text-decoration: none;
    transition: .2s ease;
}

.sidebar-link i {
    width: 16px;
    font-size: 15px;
    color: #d7ad73;
    text-align: center;
}

.sidebar-link:hover,
.sidebar-link.active {
    color: #f3c46f;
    background: rgba(199, 145, 74, .18);
    border-color: rgba(199, 145, 74, .5);
}

.sidebar-link:hover i,
.sidebar-link.active i {
    color: #f3c46f;
}

.sidebar-bottom {
    margin-top: auto;
}

.sidebar-decoration {
    display: flex;
    gap: 10px;
    padding: 15px 8px 8px;
    color: rgba(218, 173, 112, .25);
    font-size: 36px;
}

/* Responsive */
@media (max-width: 768px) {
    .admin-sidebar {
        width: 72px;
        padding: 16px 8px;
    }

    .sidebar-brand {
        justify-content: center;
        padding: 0 0 25px;
    }

    .sidebar-brand span,
    .sidebar-link span {
        display: none;
    }

    .sidebar-link {
        justify-content: center;
        padding: 14px 8px;
    }

    .sidebar-link i {
        font-size: 17px;
        width: auto;
    }

    .sidebar-decoration {
        display: none;
    }
}

</style>
</head>
<body>
<aside class="admin-sidebar">
    <a href="{{ route('Home') }}" class="sidebar-brand">
        <i class="fa-solid fa-book-open"></i>
        <span>Bookish.</span>
    </a>

    <nav class="sidebar-nav">
         <a href="{{ route('Product') }}" class="sidebar-link {{ request()->routeIs('Product') ?'active' : "" }}">
            <i class="fa-solid fa-book"></i>
            <span>Products</span>
        </a>


        <a href="{{ route('UsedProduct') }}" class="sidebar-link {{ request()->routeIs('UsedProduct') ?'active' : "" }}">
            <i class="fa-solid fa-book-open"></i>
            <span>Used Products</span>
        </a>

        <a href="{{ route('Order.admin') }}" class="sidebar-link {{ request()->routeIs('Order.admin') ?'active' : "" }}">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Orders</span>
        </a>

        <a href="{{ route('Admin.Users') }}" class="sidebar-link {{ request()->routeIs('Admin.Users') ?'active' : "" }}">
            <i class="fa-solid fa-users"></i>
            <span>Users</span>
        </a>
    </nav>

    <div class="sidebar-bottom">
        <a href="{{ route('Admin.create') }}" class="sidebar-link {{ request()->routeIs('Admin.create') ?'active' : "" }}">
            <i class="fa-solid fa-user-plus"></i>
            <span>Add New Admin</span>
        </a>

        <a href="{{ route('Home') }}" class="sidebar-link {{ request()->routeIs('Home') ?'active' : "" }}">
            <i class="fa-solid fa-user"></i>
            <span>Check User Pages</span>
        </a>

        <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="dropdown-item">
        <i class="fa-solid fa-right-from-bracket me-2"></i>
        Logout
    </button>
</form>

        <div class="sidebar-decoration">
            <i class="fa-solid fa-book-open"></i>
            <i class="fa-solid fa-leaf"></i>
        </div>
    </div>
</aside>
<main class="admin-main">
    @yield('content')
</main>

</body>
</html>
