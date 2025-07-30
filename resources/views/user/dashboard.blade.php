@extends('user.layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold text-primary mb-3">Welcome to the Dashboard</h1>
    <!-- Dashboard Summary Cards -->
    <div class="row g-4">
        <!-- Total Orders -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-primary bg-opacity-75 text-white rounded-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1">Total Orders</h6>
                        <h3 class="fw-bold">12</h3>
                    </div>
                    <i class="fas fa-shopping-cart fa-2x opacity-75"></i>
                </div>
            </div>
        </div>

        <!-- Delivered -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-success bg-opacity-75 text-white rounded-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1">Delivered</h6>
                        <h3 class="fw-bold">8</h3>
                    </div>
                    <i class="fas fa-truck fa-2x opacity-75"></i>
                </div>
            </div>
        </div>

        <!-- Pending -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-warning bg-opacity-75 text-white rounded-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1">Pending</h6>
                        <h3 class="fw-bold">3</h3>
                    </div>
                    <i class="fas fa-clock fa-2x opacity-75"></i>
                </div>
            </div>
        </div>

        <!-- Canceled -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-danger bg-opacity-75 text-white rounded-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1">Canceled</h6>
                        <h3 class="fw-bold">1</h3>
                    </div>
                    <i class="fas fa-times-circle fa-2x opacity-75"></i>
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
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom">
                            <td class="fw-semibold text-primary">#ORD-1001</td>
                            <td>July 25, 2025</td>
                            <td>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">
                                    <i class="fas fa-check-circle me-1"></i> Delivered
                                </span>
                            </td>
                            <td><strong>₱1,250.00</strong></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="fw-semibold text-primary">#ORD-1002</td>
                            <td>July 26, 2025</td>
                            <td>
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-1">
                                    <i class="fas fa-hourglass-half me-1"></i> Pending
                                </span>
                            </td>
                            <td><strong>₱560.00</strong></td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>
                        <!-- Add more rows dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection