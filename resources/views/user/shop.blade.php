@extends('user.layouts.app')

@section('content')
<div class="content-scrollable px-4 py--5" style="font-family: 'Poppins', sans-serif;">
    <h2 class="fw-bold mb-4 text-primary">🛒 Shop</h2>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row g-4">
        @forelse ($products as $product)
        <div class="col-md-4">
            <div class="card border rounded-3 h-100" style="border-color: #e5e5e5;">
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image"
                    class="card-img-top" style="height: 220px; object-fit: cover; border-radius: 0.5rem 0.5rem 0 0;">

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-semibold mb-2" style="font-size: 1.1rem;">{{ $product->name }}</h5>
                    <p class="card-text text-muted small mb-3">{{ Str::limit($product->description, 80) }}</p>
                    <p class="fw-bold text-primary mb-3">₱{{ number_format($product->price, 2) }}</p>

                    <div class="d-flex gap-2">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-50">
                            @csrf
                            <button type="submit"
                                class="btn btn-sm w-100 text-white"
                                style="background-color: #0d6efd; border-radius: 20px;">
                                <i class="fas fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </form>


                        <!-- Wishlist Button -->
                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="w-50">
                            @csrf
                            <button type="submit"
                                class="btn btn-sm w-100"
                                style="background-color: #ff3366; color: white; border-radius: 20px;">
                                <i class="fas fa-heart me-1"></i> Wishlist
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No products available.</p>
        @endforelse
    </div>
</div>
@endsection