@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary mb-0">
            <i class="fas fa-cog me-2"></i> Admin Settings
        </h2>
    </div>

    <!-- Settings Card -->
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <!-- Profile Picture -->
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('images/admincat.jpg') }}" class="rounded-circle mb-2 shadow-sm" width="100" height="100" alt="Profile">
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Change Profile</label>
                            <input type="file" class="form-control form-control-sm border-0 shadow-sm" name="profile_image">
                        </div>
                    </div>

                    <!-- Personal Info -->
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" class="form-control border-0 shadow-sm" name="email" value="admin@example.com">
                        </div>

                        <!-- Password Update -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">New Password</label>
                                <input type="password" class="form-control border-0 shadow-sm" name="new_password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <input type="password" class="form-control border-0 shadow-sm" name="confirm_password">
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                <i class="fas fa-save me-1"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
