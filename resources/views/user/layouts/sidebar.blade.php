
<div class="text-dark p-4 d-flex flex-column shadow-sm" style="width: 250px; height: 89.3vh; background-color: #ffffff; border-right: 1px solid #e0e0e0; font-family: 'Poppins', sans-serif;">
    <h4 class="mb-4 text-center fw-semibold">
        <i class="fas fa-user-circle me-2 text-primary"></i> My Account
    </h4>

    <ul class="nav flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-home me-2 text-primary"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-store me-2 text-primary"></i> Shop
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-shopping-bag me-2 text-primary"></i> My Orders
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-heart me-2 text-primary"></i> Wishlist
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-cog me-2 text-primary"></i> Settings
            </a>
        </li>
    </ul>

    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
        @csrf
        <button type="submit" class="btn btn-outline-danger w-100">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </button>
    </form>
</div>

<style>
    .hover-effect:hover {
        background-color: #f2f2f2;
        text-decoration: none;
        transition: 0.3s ease-in-out;
    }
</style>