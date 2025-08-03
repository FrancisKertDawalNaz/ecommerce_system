@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary mb-0">
            <i class="fas fa-receipt me-2"></i> Orders
        </h2>
        <button class="btn btn-outline-primary rounded-pill px-4">
            <i class="fas fa-download me-1"></i> Export
        </button>
    </div>

    <!-- Order Table -->
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Row -->
                        <tr>
                            <td>#ORD12345</td>
                            <td>Juan Dela Cruz</td>
                            <td>July 30, 2025</td>
                            <td>₱2,199.00</td>
                            <td>
                                <span class="badge bg-warning text-dark">Pending</span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary rounded-pill">
                                    <i class="fas fa-eye me-1"></i> View
                                </button>
                                <button class="btn btn-sm btn-success rounded-pill">
                                    <i class="fas fa-check me-1"></i> Approve
                                </button>
                            </td>
                        </tr>
                        <!-- Add more rows dynamically here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
