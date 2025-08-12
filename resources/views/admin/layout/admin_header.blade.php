<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3" style="font-family: 'Poppins', sans-serif;">
    <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="#">
        <i class="fas fa-store me-2 fa-lg text-primary"></i>
        <span class="fs-5">Admin Shop Dashboard</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
        {{-- Right Icons --}}
        <ul class="navbar-nav ms-auto align-items-center">
            {{-- Notification Dropdown --}}
            <li class="nav-item dropdown me-3">
                <a class="nav-link position-relative" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell fa-lg text-primary"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm p-3" aria-labelledby="notifDropdown" style="width: 300px;">
                    <h6 class="dropdown-header text-primary">🔔 Notifications</h6>
                    <li class="mb-2">
                        <div class="small text-muted">📦 Order #ORD1234 shipped</div>
                    </li>
                    <li class="mb-2">
                        <div class="small text-muted">💬 New message received</div>
                    </li>
                    <li class="mb-2">
                        <div class="small text-muted">🔥 Hot deals available now!</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a href="#" class="btn btn-sm btn-outline-secondary w-100 rounded-pill">View All</a></li>
                </ul>
            </li>


            {{-- User Dropdown --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fw-medium text-dark">{{ session('loggedUser')->name ?? 'Admin' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li><a class="dropdown-item" href="{{ route('settings') }}">👤 Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('settings') }}">⚙️ Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('adminlogout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">🚪 Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>