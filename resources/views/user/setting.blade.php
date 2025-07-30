@extends('user.layouts.app')

@section('content')
<div class="content-scrollable px-4 py-5" style="font-family: 'Poppins', sans-serif;">
    <h2 class="fw-bold mb-4 text-primary">
        <i class="fas fa-cog me-2 text-primary"></i> Account Settings
    </h2>

    <div class="row g-4">
        <!-- Profile Info -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3 fw-semibold">
                        <i class="fas fa-user-circle me-2 text-secondary"></i> Profile Information
                    </h5>
                    <p><strong>Name:</strong> Juan Dela Cruz</p>
                    <p><strong>Email:</strong> juan@email.com</p>
                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">
                        <i class="fas fa-edit me-1"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Security -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3 fw-semibold">
                        <i class="fas fa-lock me-2 text-secondary"></i> Security
                    </h5>
                    <p><strong>Password:</strong> ••••••••</p>
                    <a href="#" class="btn btn-sm btn-outline-danger rounded-pill">
                        <i class="fas fa-key me-1"></i> Change Password
                    </a>
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3 fw-semibold">
                        <i class="fas fa-bell me-2 text-secondary"></i> Notifications
                    </h5>
                    <p>You are subscribed to email updates.</p>
                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill">
                        <i class="fas fa-envelope me-1"></i> Manage Notifications
                    </a>
                </div>
            </div>
        </div>

        <!-- Address -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3 fw-semibold">
                        <i class="fas fa-map-marker-alt me-2 text-secondary"></i> Shipping Address
                    </h5>
                    <p>Brgy. San Isidro, LSPU Laguna, Philippines</p>
                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill">
                        <i class="fas fa-edit me-1"></i> Edit Address
                    </a>
                </div>
            </div>
        </div>

        <!-- 🔴 Delete Account -->
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-4 border-danger">
                <div class="card-body">
                    <h5 class="card-title mb-3 fw-semibold text-danger">
                        <i class="fas fa-trash-alt me-2"></i> Delete Account
                    </h5>
                    <p class="text-muted">Once your account is deleted, all your data will be permanently removed. This action cannot be undone.</p>

                    <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger rounded-pill">
                            <i class="fas fa-trash me-1"></i> Delete My Account
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
