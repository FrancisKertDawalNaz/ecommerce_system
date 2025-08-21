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
                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#editProfileModal">
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
                    </h5> <a href="#" class="btn btn-sm btn-outline-danger rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#changePasswordModal">
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


        <!-- Delete Account Button -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
            Delete Account
        </button>


        <!-- Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete your account? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                        <form action="{{ route('account.delete') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Yes, Delete My Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium">Name</label>
                        <input type="text" class="form-control rounded-3" id="name" name="name"
                            value="{{ session('loggedUser')['name'] ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">Email</label>
                        <input type="email" class="form-control rounded-3" id="email" name="email"
                            value="{{ session('loggedUser')['email'] ?? '' }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header">
        <h5 class="modal-title fw-semibold" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ route('profile.changePassword') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body">
          <div class="mb-3">
            <label for="current_password" class="form-label fw-medium">Current Password</label>
            <input type="password" class="form-control rounded-pill" id="current_password" name="current_password" required>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label fw-medium">New Password</label>
            <input type="password" class="form-control rounded-pill" id="new_password" name="new_password" required>
          </div>
          <div class="mb-3">
            <label for="new_password_confirmation" class="form-label fw-medium">Confirm New Password</label>
            <input type="password" class="form-control rounded-pill" id="new_password_confirmation" name="new_password_confirmation" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger rounded-pill">Update Password</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection