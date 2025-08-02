<!-- Sidebar -->
<div id="sidebar" class="bg-white border-end shadow-sm p-3 d-flex flex-column" style="font-family: 'Poppins', sans-serif; min-height: 86vh;">
    <h4 class="text-center fw-semibold mb-4">
        <i class="fas fa-user-cog text-primary me-2"></i> <span class="sidebar-label">Admin Panel</span>
    </h4>

    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a href="{{ route('admindashboard') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-chart-line me-2 text-primary"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('adminproduct') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect  border-primary">
                <i class="fas fa-box-open me-2 text-primary"></i> Products
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admincategories') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-list me-2 text-primary"></i> Categories
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('adminorder') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-shopping-cart me-2 text-primary"></i> Orders
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admincustomer') }}" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-users me-2 text-primary"></i> Customers
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-star me-2 text-primary"></i> Reviews
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark px-3 py-2 rounded hover-effect">
                <i class="fas fa-cogs me-2 text-primary"></i> Settings
            </a>
        </li>
    </ul>
    <hr class="my-4 text-muted"> 
    <form action="{{ route('adminlogout') }}" method="POST" class="mt-3 pt-1">
        @csrf
        <button type="submit" class="btn btn-outline-danger w-100">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </button>
    </form>
</div>

