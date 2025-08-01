<!-- Sidebar + Content Wrapper -->
<div class="d-flex" id="wrapper" style="font-family: 'Poppins', sans-serif; min-height: 86vh;">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-white border-end shadow-sm p-3 d-flex flex-column" style="width: 250px; transition: 0.3s;">
        <h4 class="text-center fw-semibold mb-4">
            <i class="fas fa-user-circle text-primary me-2"></i> <span class="sidebar-label">My Account</span>
        </h4>

        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('dashboard') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-home text-primary me-2"></i> <span class="sidebar-label">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('shop') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-store text-primary me-2"></i> <span class="sidebar-label">Shop</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('orders') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-shopping-bag text-primary me-2"></i> <span class="sidebar-label">My Orders</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('wishlist') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-heart text-primary me-2"></i> <span class="sidebar-label">Wishlist</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('setting') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-cog text-primary me-2"></i> <span class="sidebar-label">Settings</span>
                </a>
            </li>
        </ul>
        <hr class="my-4 text-muted"> 
        <form action="{{ route('logout') }}" method="POST" class="mt-3 pt-6">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100">
                <i class="fas fa-sign-out-alt me-2"></i> <span class="sidebar-label">Logout</span>
            </button>
        </form>
    </div>
</div>

