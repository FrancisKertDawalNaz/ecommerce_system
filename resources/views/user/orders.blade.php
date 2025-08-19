@extends('user.layouts.app')

@section('content')
<div class="content-scrollable px-4 py-5" style="font-family: 'Poppins', sans-serif;">
    <h2 class="fw-bold mb-4 text-primary">
        <i class="fas fa-shopping-bag me-2 text-primary"></i> My Orders
    </h2>

    @forelse($orders as $order)
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <div>
                    <strong>Order #ORD{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</strong> <br>
                    <small class="text-muted">Ordered on: {{ $order->created_at->format('F d, Y') }}</small>
                </div>
                <span class="badge 
                    @if($order->status == 'pending') bg-warning
                    @elseif($order->status == 'processing') bg-primary
                    @else bg-success @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <div class="card-body">
                {{-- Show Product Details --}}
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ $order->product->image_url ?? asset('images/default.png') }}" 
                         class="rounded border"
                         style="width: 80px; height: 80px; object-fit: cover;" alt="Product Image">
                    <div class="ms-3">
                        <h6 class="mb-1">{{ $order->product->name ?? 'Product' }}</h6>
                        <small class="text-muted">₱{{ number_format($order->product->price, 2) }} × {{ $order->quantity }}</small>
                    </div>
                    <div class="ms-auto fw-semibold">
                        ₱{{ number_format($order->total_price, 2) }}
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <strong>Total Amount:</strong>
                    <strong>₱{{ number_format($order->total_price, 2) }}</strong>
                </div>
            </div>

            <div class="card-footer bg-white text-end">
                <button class="btn btn-outline-secondary btn-sm">Track Order</button>
                <button class="btn btn-outline-primary btn-sm">View Details</button>
            </div>
        </div>
    @empty
        <div class="alert alert-info rounded-4">
            <i class="fas fa-info-circle me-2"></i> You have no orders yet.
        </div>
    @endforelse
</div>
@endsection
