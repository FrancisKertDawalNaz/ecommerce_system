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
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="card-title fw-semibold mb-0" style="font-size: 1.1rem;">
                            {{ $product->name }}
                        </h5>
                        <!-- Wishlist Icon -->
                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 border-0" style="color: #ff3366;">
                                <i class="fas fa-heart"></i>
                            </button>
                        </form>
                    </div>

                    <p class="card-text text-muted small mb-3">{{ Str::limit($product->description, 80) }}</p>
                    <p class="fw-bold text-primary mb-3">₱{{ number_format($product->price, 2) }}</p>

                    <div class="d-flex gap-2">
                        <!-- Add to Cart -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-50">
                            @csrf
                            <button type="submit"
                                class="btn btn-sm w-100 text-white"
                                style="background-color: #0d6efd; border-radius: 20px;">
                                <i class="fas fa-cart-plus me-1"></i> Add to Cart
                            </button>
                        </form>

                        <!-- Buy Now -->
                        <button type="button"
                            class="btn btn-sm w-50 text-white"
                            style="background-color: #28a745; border-radius: 20px;"
                            data-bs-toggle="modal"
                            data-bs-target="#buyNowModal-{{ $product->id }}">
                            <i class="fas fa-bolt me-1"></i> Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buy Now Modal (unique per product) -->
        <div class="modal fade" id="buyNowModal-{{ $product->id }}" tabindex="-1"
            aria-labelledby="buyNowModalLabel-{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold" id="buyNowModalLabel-{{ $product->id }}">Confirm Purchase</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('order.buyNow', $product->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p class="mb-3">
                                Are you sure you want to buy <strong>{{ $product->name }}</strong> for
                                <span class="text-success fw-bold">₱{{ number_format($product->price, 2) }}</span>?
                            </p>

                            <div class="mb-3">
                                <label for="quantity-{{ $product->id }}" class="form-label fw-medium">Quantity</label>
                                <input type="number" name="quantity" id="quantity-{{ $product->id }}" class="form-control rounded-pill"
                                    value="1" min="1" max="{{ $product->stock }}">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success rounded-pill">Confirm Purchase</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p>No products available.</p>
        @endforelse
    </div>
</div>
@endsection
