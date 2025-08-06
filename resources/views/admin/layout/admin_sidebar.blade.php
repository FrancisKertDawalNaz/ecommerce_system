<!-- Sidebar + Content Wrapper -->
<div class="d-flex" id="wrapper" style="font-family: 'Poppins', sans-serif; min-height: 86vh;">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-white border-end shadow-sm p-3 d-flex flex-column" style="width: 250px; transition: 0.3s;">
        <h4 class="text-center fw-semibold mb-4">
            <i class="fas fa-user-cog text-primary me-2"></i> <span class="sidebar-label">Admin Panel</span>
        </h4>

        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('admindashboard') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-chart-line me-2 text-primary"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('product') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-box-open me-2 text-primary"></i> Products
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('order') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-shopping-cart me-2 text-primary"></i> Orders
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('customer') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-users me-2 text-primary"></i> Customers
                </a>
            </li>
             <li class="nav-item mb-2">
                <a href="{{ route('review') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-star me-2 text-primary"></i> Reviews
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('settings') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                    <i class="fas fa-cogs me-2 text-primary"></i> Settings
                </a>
            </li>
        </ul>
        <hr class="my-4 text-muted"> 
        <form action="{{ route('adminlogout') }}" method="POST" class="mt-3 pt-6">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100">
                <i class="fas fa-sign-out-alt me-2"></i> <span class="sidebar-label">Logout</span>
            </button>
        </form>
    </div>
</div>

