<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3" style="font-family: 'Poppins', sans-serif;">
    <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="#">
        <i class="fas fa-store me-2 fa-lg text-primary"></i> 
        <span class="fs-5">ShopDashboard</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarContent">

        {{-- Search Bar --}}
        <form class="d-flex mx-auto w-50">
            <input class="form-control me-2 rounded-pill border-primary shadow-sm" type="search"
                placeholder="Search for products, brands..." aria-label="Search">
            <button class="btn btn-primary rounded-pill px-4" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>

        {{-- Right Icons --}}
        <ul class="navbar-nav ms-auto align-items-center">
            {{-- Cart --}}
            <li class="nav-item me-3">
                <a class="nav-link position-relative" href="#">
                    <i class="fas fa-shopping-cart fa-lg text-primary"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </a>
            </li>

            {{-- Notifications --}}
            <li class="nav-item me-3">
                <a class="nav-link position-relative" href="#">
                    <i class="fas fa-bell fa-lg text-primary"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">
                        5
                    </span>
                </a>
            </li>

            {{-- User Dropdown --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name=User&background=0D8ABC&color=fff" alt="Avatar"
                        class="rounded-circle me-2 shadow-sm" width="32" height="32">
                    <span class="fw-medium text-dark">{{ session('loggedUser')->name ?? 'User' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li><a class="dropdown-item" href="#">👤 Profile</a></li>
                    <li><a class="dropdown-item" href="#">⚙️ Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">🚪 Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
