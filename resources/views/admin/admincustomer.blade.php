@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary mb-0">
            <i class="fas fa-users me-2"></i> Customers
        </h2>
    </div>

    <!-- Customer Table -->
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-uppercase small text-muted">
                            <th class="px-4 py-3">Customer</th>
                            <th>Email</th>
                            <th>Joined</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Row -->
                        <tr class="border-bottom">
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="Avatar">
                                    <span class="fw-semibold">Juan Dela Cruz</span>
                                </div>
                            </td>
                            <td>juan@example.com</td>
                            <td>July 25, 2025</td>
                            <td>
                                <span class="badge bg-success rounded-pill px-3 py-2">Active</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        <i class="fas fa-eye me-1"></i> View
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                        <i class="fas fa-user-slash me-1"></i> Ban
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
