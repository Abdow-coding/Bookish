
@extends('Admin_sidebar_layout')

@section('title', 'Users Management')

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

    .users-page {
        margin-left: 248px;
        min-height: 100vh;
        padding: 108px 20px 40px;
        background: var(--cream);
        color: var(--text-dark);
        font-family: 'DM Sans', sans-serif;
        box-sizing: border-box;
    }

    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .users-subtitle {
        color: var(--wood-light);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 2px;
    }

    .users-header h1 {
        margin: 8px 0 5px;
        color: var(--wood-dark);
        font-family: 'Playfair Display', serif;
        font-size: 39px;
        font-weight: 700;
    }

    .users-header p {
        margin: 0;
        color: var(--text-muted);
        font-size: 14px;
    }

    .users-count {
        padding: 12px 16px;
        background: var(--paper);
        border: 1px solid var(--border-color);
        border-radius: 10px;
        color: var(--wood);
        font-size: 13px;
        white-space: nowrap;
    }

    .users-card {
        width: 100%;
        overflow: hidden;
        background: var(--paper);
        border: 1px solid #ebdfd0;
        border-radius: 15px;
        box-shadow: 0 15px 45px #5538200c;
    }

    .users-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        padding: 23px 20px 17px;
    }

    .users-card-header h2 {
        margin: 0;
        color: var(--wood-dark);
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
    }

    .users-search {
        display: flex;
        align-items: center;
        gap: 10px;
        width: min(360px, 100%);
        height: 43px;
        padding: 0 14px;
        background: #fffdf9;
        border: 1px solid var(--border-color);
        border-radius: 9px;
        color: var(--wood);
    }

    .users-search input {
        width: 100%;
        min-width: 0;
        border: 0;
        outline: none;
        background: transparent;
        color: var(--text-dark);
        font-size: 13px;
    }

    .users-search:focus-within {
        border-color: var(--wood-light);
    }

    .users-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
        white-space: nowrap;
    }

    .users-table thead {
        background: #f3eadc;
    }

    .users-table thead th {
        padding: 14px 15px;
        color: #765039;
        font-size: 12px;
        font-weight: 700;
        text-align: left;
        border-bottom: 1px solid var(--border-color);
    }

    .users-table tbody td {
        padding: 15px;
        color: var(--text-muted);
        font-size: 13px;
        border-bottom: 1px solid #efe5d8;
        vertical-align: middle;
    }

    .users-table tbody tr:hover {
        background: #fdf6eb;
    }

    .users-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .user-id {
        color: var(--wood);
        font-weight: 700;
    }

    .user-name {
        color: var(--wood-dark);
        font-weight: 700;
    }

    .user-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        margin-right: 10px;
        border-radius: 50%;
        background: #efe0ca;
        color: var(--wood);
        font-size: 14px;
        font-weight: 700;
        vertical-align: middle;
    }

    .empty-users {
        padding: 45px 20px;
        color: var(--text-muted);
        text-align: center;
    }

    .empty-users i {
        display: block;
        margin-bottom: 12px;
        color: var(--wood-light);
        font-size: 35px;
    }

    .users-card-footer {
        padding: 16px 20px;
        border-top: 1px solid #efe5d8;
        color: var(--text-muted);
        font-size: 12px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    @media (max-width: 850px) {
        .users-page {
            margin-left: 0;
            padding: 91px 18px 28px;
        }

        .users-header h1 {
            font-size: 34px;
        }
    }

    @media (max-width: 600px) {
        .users-page {
            padding: 85px 11px 24px;
        }

        .users-header,
        .users-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .users-header h1 {
            font-size: 31px;
        }

        .users-search {
            width: 100%;
        }

        .users-table thead th,
        .users-table tbody td {
            padding: 12px 10px;
        }
    }
</style>

<main class="users-page">
    <header class="users-header">
        <div>
            <span class="users-subtitle">BOOKISH ADMIN</span>
            <h1>Users Management</h1>
            <p>Manage and review registered users.</p>
        </div>

        <div class="users-count">
            <i class="fa-solid fa-users"></i>
            Total Users: {{ $data->count() }}
        </div>
    </header>

    <section class="users-card">
        <div class="users-card-header">
            <h2>Registered Users</h2>

            <label class="users-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input
                    type="search"
                    id="userSearch"
                    placeholder="Search users..."
                    aria-label="Search users">
            </label>
        </div>

        <div class="table-responsive">
            <table class="users-table" id="usersTable">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registered At</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $user)
                        <tr>
                            <td>
                                <span class="user-id">#{{ $user->id }}</span>
                            </td>

                            <td>
                                <span class="user-avatar">
                                    {{ strtoupper(substr($user->first_name ?? $user->name ?? 'U', 0, 1)) }}
                                </span>
                                <span class="user-name">
                                    {{ trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? '')) ?: ($user->name ?? 'Unknown') }}
                                </span>
                            </td>

                            <td>{{ $user->email ?? '—' }}</td>

                            <td>0{{ $user->phone_number ?? '—' }}</td>

                            <td>
                                {{ $user->created_at
                                    ? \Carbon\Carbon::parse($user->created_at)->format('Y-m-d')
                                    : '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-users">
                                    <i class="fa-solid fa-users"></i>
                                    <p>No users found.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="users-card-footer">
            Showing {{ $data->count() }} registered users
        </div>
    </section>
</main>

<script>
    document.getElementById('userSearch').addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();

        document.querySelectorAll('#usersTable tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(query)
                ? ''
                : 'none';
        });
    });
</script>
@endsection
