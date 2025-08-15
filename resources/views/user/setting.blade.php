@extends('user.layouts.app')

@section('content')
<div class="content-scrollable px-4 py-5" style="font-family: 'Poppins', sans-serif;">
    <h2 class="fw-bold mb-4 text-primary">
        <i class="fas fa-cog me-2 text-primary"></i> Account Settings
    </h2>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        <!-- Profile Info -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h5 class="card-title mb-3 fw-semibold">
                        <i class="fas fa-user-circle me-2 text-secondary"></i> Profile Information
                    </h5>
                    <p><strong>Name: </strong>{{ session('loggedUser')['name'] ?? 'User' }}</p>
                    <p><strong>Email: </strong>{{ session('loggedUser')['email'] ?? 'User' }}</p>
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
                    </h5> <a href="#" class="btn btn-sm btn-outline-danger rounded-pill">
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
                    <p>{{ $user->address ?? 'No address set' }}</p>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-outline-success rounded-pill" data-bs-toggle="modal" data-bs-target="#editAddressModal">
                        <i class="fas fa-edit me-1"></i> Edit Address
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 border-0 shadow-lg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAddressModalLabel">Edit Shipping Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update.address') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="address" class="form-label fw-semibold">Address</label>
                                <input type="text" name="address" id="address"
                                    class="form-control rounded-3"
                                    value="{{ old('address', $user->address) }}"
                                    placeholder="Enter your address">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success rounded-pill">Save Changes</button>
                        </div>
                    </form>
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