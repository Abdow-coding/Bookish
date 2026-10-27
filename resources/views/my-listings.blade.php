
@extends('layout')

@section('title', 'My Listings')

@section('content')
<style>

/* My Listings Page */
.listings-page {
    padding-top: 55px !important;
    padding-bottom: 65px !important;
    color: #432719;
}

.listings-header {
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #eadfce;
}

.listings-header h2 {
    color: #432719;
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 8px;
}

.listings-header p {
    color: #897563;
    margin-bottom: 0;
    font-size: 15px;
}

/* Book Card */
.listing-card {
    background: #fffaf2;
    border: 1px solid #e6d6c1;
    border-radius: 14px;
    padding: 24px !important;
    box-shadow: 0 5px 18px rgba(67, 39, 25, 0.07);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.listing-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(67, 39, 25, 0.13);
}

.listing-title {
    color: #432719;
    font-size: 21px;
    font-weight: 750;
    margin-bottom: 10px;
    overflow-wrap: anywhere;
}

.listing-author {
    color: #806c5b;
    font-size: 15px;
    margin-bottom: 18px;
}

.listing-details {
    display: flex;
    flex-wrap: wrap;
    gap: 15px 35px;
    padding: 15px 0;
    border-top: 1px solid #eadfce;
    border-bottom: 1px solid #eadfce;
}

.listing-details p {
    margin: 0;
    color: #806c5b;
    font-size: 15px;
}

.listing-details strong {
    color: #432719;
    margin-left: 5px;
    font-weight: 750;
}

/* Status Badges */
.listing-status {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    width: fit-content;
    margin: 18px 0 0;
    padding: 8px 14px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 750;
}

.listing-status::before {
    content: "";
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: currentColor;
}

.status-pending {
    color: #c62828;
    background: #fde8e8;
    border: 1px solid #f4caca;
}

.status-approved {
    color: #218344;
    background: #e3f6e9;
    border: 1px solid #bce5c9;
}

/* Empty State */
.empty-listings {
    padding: 45px 20px;
    text-align: center;
    background: #fffaf2;
    border: 1px dashed #d8c4a8;
    border-radius: 14px;
}

.empty-listings h4 {
    color: #432719;
    font-weight: 750;
    margin-bottom: 10px;
}

.empty-listings p {
    color: #897563;
    margin-bottom: 0;
}

/* Responsive */
@media (max-width: 576px) {
    .listings-page {
        padding-top: 35px !important;
    }

    .listings-header h2 {
        font-size: 26px;
    }

    .listing-card {
        padding: 18px !important;
    }

    .listing-details {
        gap: 12px;
        flex-direction: column;
    }
}

</style>

<div class="container py-5 listings-page">
    <div class="listings-header">
        <div>
            <h2>My Books for Sale</h2>
            <p>Manage and track the books you listed for sale.</p>
        </div>
    </div>

    @forelse ($products as $product)
        <div class="card mb-3 p-3 listing-card">
            <h5 class="listing-title">{{ $product->title }}</h5>

            <p class="listing-author">
                Author: {{ $product->author }}
            </p>

            <div class="listing-details">
                <p>
                    <span>Price:</span>
                    <strong>{{ number_format($product->price, 2) }}</strong>
                </p>

                <p>
                    <span>Stock:</span>
                    <strong>{{ $product->stock }}</strong>
                </p>
            </div>

            @if ($product->status == 'Non Active')
                <p class="listing-status status-pending">
                    Pending Approval
                </p>
            @else
                <p class="listing-status status-approved">
                    Approved
                </p>
            @endif
        </div>
    @empty
        <div class="empty-listings">
            <h4>No books listed yet</h4>
            <p>You haven't submitted any books for sale yet.</p>
        </div>
    @endforelse
</div>

@endsection
