@extends('user.layouts.app')

@section('content')
<div class="content-scrollable px-4 py--5" style="font-family: 'Poppins', sans-serif;">
    <h2 class="fw-bold mb-4 text-primary">❤️ My Wishlist</h2>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row g-4">
        @forelse ($wishlistItems as $item)
        <div class="col-md-4 col-sm-6">
            <div class="card h-100 border-0 shadow-sm rounded-4">
                <img src="{{ asset('storage/' . $item->product->image_url) }}"
                    alt="{{ $item->product->name }}"
                    class="card-img-top rounded-top-4"
                    style="height: 220px; object-fit: cover;">

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-semibold mb-2" style="font-size: 1.1rem;">
                        {{ $item->product->name }}
                    </h5>
                    <p class="text-muted small mb-2">₱{{ number_format($item->product->price, 2) }}</p>

                    <div class="mt-auto d-flex justify-content-between gap-2">
                        <!-- Remove Button -->
                        <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-light border border-danger-subtle text-danger fw-semibold px-3 py-2 rounded-pill d-flex align-items-center gap-1 shadow-sm" style="font-size: 0.9rem;">
                                <i class="fas fa-trash-alt"></i> Remove
                            </button>
                        </form>

                        <!-- Add to Cart Button (fixed) -->
                        <form action="{{ route('cart.add', $item->product->id) }}" method="POST" class="w-50">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn text-white fw-semibold px-3 py-2 rounded-pill d-flex align-items-center gap-1 shadow-sm" style="font-size: 0.9rem; background-color: #0d6efd;">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p class="text-muted">No items in your wishlist yet.</p>
        @endforelse
    </div>
</div>
@endsection