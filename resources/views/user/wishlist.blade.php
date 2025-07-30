    @extends('user.layouts.app')

    @section('content')
    <div class="content-scrollable px-4 py--5" style="font-family: 'Poppins', sans-serif;">
        <h2 class="fw-bold mb-4 text-primary">❤️ My Wishlist</h2>

        <div class="row g-4">
            @for ($i = 1; $i <= 6; $i++)
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow-sm rounded-4">
                    <img src="{{ asset('images/products/one.jpg') }}" 
                        alt="Product {{ $i }}" 
                        class="card-img-top rounded-top-4"
                        style="height: 220px; object-fit: cover;">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold mb-2" style="font-size: 1.1rem;">Sample Product {{ $i }}</h5>
                        <p class="text-muted small mb-2">₱{{ number_format(1000 + ($i * 100), 2) }}</p>

                        <div class="mt-auto d-flex justify-content-between gap-2">
                            <button class="btn btn-sm btn-outline-danger w-100 rounded-pill">
                                <i class="fas fa-trash-alt me-1"></i> Remove
                            </button>
                            <button class="btn btn-sm btn-primary w-100 rounded-pill">
                                <i class="fas fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    @endsection
