@extends('user.layouts.app')

@section('content')
<div class="content-scrollable px-4 py-5">
    <h1 class="fw-bold text-primary mb-3">Welcome to the Dashboard</h1>
    <!-- Dashboard Summary Cards -->
    <div class="row g-4 mb-4">
        <!-- Total Orders -->
        <div class="col-md-3 col-sm-6">
            <div class="card border-primary shadow-sm rounded-4 p-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-primary text-white rounded-circle p-3 me-3">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 text-secondary">Total Orders</h6>
                        <h3 class="fw-bold mb-0">{{$Orders}}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delivered -->
        <div class="col-md-3">
            <div class="card border-primary shadow-sm rounded-4 p-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-success text-white rounded-circle p-3 me-3">
                        <i class="fas fa-truck fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 text-secondary">Delivered</h6>
                        <h3 class="fw-bold mb-0">8</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending -->
        <div class="col-md-3">
            <div class="card border-primary shadow-sm rounded-4 p-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-warning text-white rounded-circle p-3 me-3">
                        <i class="fas fa-clock fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 text-secondary">Pending</h6>
                        <h3 class="fw-bold mb-0">3</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Canceled -->
        <div class="col-md-3">
            <div class="card border-primary shadow-sm rounded-4 p-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="bg-danger text-white rounded-circle p-3 me-3">
                        <i class="fas fa-times-circle fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-1 text-secondary">Canceled</h6>
                        <h3 class="fw-bold mb-0">1</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Recent Orders Table -->
    <div class="card mt-5 shadow-sm border-0 rounded-4">
        <div class="card-header bg-white fw-semibold d-flex align-items-center gap-2 border-bottom">
            <i class="fas fa-clock text-primary fs-5"></i>
            <span class="fs-5 text-primary">Recent Orders</span>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase small text-secondary">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                        <tr class="border-bottom">
                            <td class="fw-semibold text-primary">#ORD-{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('F d, Y') }}</td>
                            <td>
                                @if($order->status === 'delivered')
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">
                                    <i class="fas fa-check-circle me-1"></i> Delivered
                                </span>
                                @elseif($order->status === 'pending')
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">
                                    <i class="fas fa-hourglass-half me-1"></i> Pending
                                </span>
                                @elseif($order->status === 'canceled')
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-3 py-1">
                                    <i class="fas fa-times-circle me-1"></i> Canceled
                                </span>
                                @else
                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3 py-1">
                                    <i class="fas fa-info-circle me-1"></i> {{ ucfirst($order->status) }}
                                </span>
                                @endif
                            </td>
                            <td><strong>₱{{ number_format($order->total_price, 2) }}</strong></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No recent orders found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection