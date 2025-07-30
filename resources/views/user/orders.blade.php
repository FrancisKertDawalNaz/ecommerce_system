@extends('user.layouts.app')

@section('content')
<div class="content-scrollable px-4 py-4" style="font-family: 'Poppins', sans-serif;">
    <h2 class="fw-bold mb-4 text-primary">My Orders</h2>

    @for ($i = 1; $i <= 3; $i++)
        <div class="card mb-4 shadow-sm border-0 rounded-4">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <div>
                <strong>Order #ORD100{{ $i }}</strong> <br>
                <small class="text-muted">Ordered on: July {{ 25 + $i }}, 2025</small>
            </div>
            <span class="badge bg-{{ $i == 1 ? 'warning' : ($i == 2 ? 'primary' : 'success') }}">
                {{ $i == 1 ? 'Pending' : ($i == 2 ? 'Processing' : 'Completed') }}
            </span>
        </div>

        <div class="card-body">
            <!-- Item list inside the order -->
            <div class="d-flex align-items-center mb-3">
                <img src="https://via.placeholder.com/80" class="rounded border" alt="Product Image">
                <div class="ms-3">
                    <h6 class="mb-1">Sample Product A</h6>
                    <small class="text-muted">₱500.00 × 1</small>
                </div>
                <div class="ms-auto fw-semibold">
                    ₱500.00
                </div>
            </div>

            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/80" class="rounded border" alt="Product Image">
                <div class="ms-3">
                    <h6 class="mb-1">Sample Product B</h6>
                    <small class="text-muted">₱250.00 × 2</small>
                </div>
                <div class="ms-auto fw-semibold">
                    ₱500.00
                </div>
            </div>

            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <strong>Total Amount:</strong>
                <strong>₱1,000.00</strong>
            </div>
        </div>

        <div class="card-footer bg-white text-end">
            <button class="btn btn-outline-secondary btn-sm">Track Order</button>
            <button class="btn btn-outline-primary btn-sm">View Details</button>
        </div>
</div>
@endfor

<!-- Static Pagination -->
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">»</a></li>
    </ul>
</nav>
</div>
@endsection