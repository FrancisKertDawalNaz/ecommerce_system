@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary mb-0">
            <i class="fas fa-receipt me-2"></i> Orders
        </h2>
        <button class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
            <i class="fas fa-download me-1"></i> Export
        </button>
    </div>

    <!-- Orders Table -->
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-uppercase small text-muted">
                            <th scope="col" class="px-4 py-3">Order ID</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Row -->
                        <tr class="border-bottom align-middle">
                            <td class="px-4 py-3 fw-semibold">#ORD12345</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-2 me-2">
                                        <i class="fas fa-user text-primary"></i>
                                    </div>
                                    <span>Juan Dela Cruz</span>
                                </div>
                            </td>
                            <td>July 30, 2025</td>
                            <td class="fw-semibold text-success">₱2,199.00</td>
                            <td>
                                <span class="badge rounded-pill bg-warning text-dark px-3 py-2">Pending</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        <i class="fas fa-eye me-1"></i> View
                                    </button>
                                    <button class="btn btn-sm btn-outline-success rounded-pill px-3">
                                        <i class="fas fa-check me-1"></i> Approve
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- More rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
