<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3" style="font-family: 'Poppins', sans-serif;">
    <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="#">
        <i class="fas fa-store me-2 fa-lg text-primary"></i>
        <span class="fs-5">Shop Dashboard</span>
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
            {{-- Cart Dropdown --}}
            <li class="nav-item dropdown me-3">
                <a class="nav-link position-relative" href="#" id="cartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-shopping-cart fa-lg text-primary"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm p-3" aria-labelledby="cartDropdown" style="width: 300px;">
                    <h6 class="dropdown-header text-primary">🛒 Cart</h6>

                    @php
                    $cart = session('cart', []);
                    @endphp

                    @forelse ($cart as $item)
                    <li class="d-flex align-items-center mb-2">
                        <img src="{{ asset('storage/' . $item['image']) }}" class="rounded me-2" width="40" height="40">
                        <div class="flex-grow-1">
                            <div class="fw-semibold">{{ $item['name'] }}</div>
                            <small class="text-muted">
                                ₱{{ number_format($item['price'], 2) }} × {{ $item['quantity'] }}
                            </small>
                        </div>
                        <div class="text-end ms-2 fw-semibold">
                            ₱{{ number_format($item['price'] * $item['quantity'], 2) }}
                        </div>
                    </li>
                    @empty
                    <li class="text-center text-muted small">Your cart is empty</li>
                    @endforelse

                    @if(count($cart) > 0)
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="{{ route('cart.index') }}" class="btn btn-sm btn-primary w-100 rounded-pill">View Cart</a>
                    </li>
                    @endif
                </ul>
            </li>


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
                    <span class="fw-medium text-dark">{{ session('loggedUser')->name ?? 'User' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                    <li><a class="dropdown-item" href="{{ route('setting') }}">👤 Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('setting') }}">⚙️ Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
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