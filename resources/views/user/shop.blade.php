@extends('user.layouts.app')

@section('content')
<div class="container" style="font-family: 'Poppins', sans-serif;">
    <h2 class="fw-bold mb-4 text-primary">🛒 Shop</h2>

    <div class="row g-4">
        @forelse ($products as $product)
        <div class="col-md-4">
            <div class="card border rounded-3 h-100" style="border-color: #e5e5e5;">
                <img src="{{ asset('images/products/one.jpg') }}" alt="{{ $product->name }}"
                    class="card-img-top" style="height: 220px; object-fit: cover; border-radius: 0.5rem 0.5rem 0 0;">

                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-2" style="font-size: 1.1rem;">{{ $product->name }}</h5>
                    <p class="card-text text-muted small mb-3">{{ Str::limit($product->description, 80) }}</p>
                    <p class="fw-bold text-primary mb-3">₱{{ number_format($product->price, 2) }}</p>

                    <!-- Add to Cart Button -->
                    <a href="#modal-{{ $product->id }}" class="btn btn-sm btn-outline-primary w-100 rounded-pill">
                        <i class="fas fa-cart-plus me-1"></i> Add to Cart
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p>No products available.</p>
        @endforelse
    </div>
</div>
@endsection
