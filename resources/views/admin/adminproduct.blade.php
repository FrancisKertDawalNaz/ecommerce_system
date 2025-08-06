@extends('admin.layout.admin_app')

@section('content')
<div class="content-scrollable px-4 py--5">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary mb-0">
            <i class="fas fa-bag-shopping me-2"></i> Product Management
        </h2>
        <button class="btn btn-primary px-4 rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus me-1"></i> Add Product
        </button>
    </div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @forelse ($products as $product)
        <div class="col-md-4">
            <div class="card border rounded-4 shadow-sm h-100 d-flex flex-column justify-content-between" style="border-color: #e5e5e5;">
                <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image"
                    class="card-img-top" style="height: 220px; object-fit: cover; border-radius: 1rem 1rem 0 0;">

                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-2" style="font-size: 1.1rem;">{{ $product->name }}</h5>
                    <p class="card-text text-muted small mb-3">{{ Str::limit($product->description, 80) }}</p>
                    <p class="fw-bold text-primary mb-3">₱{{ number_format($product->price, 2) }}</p>
                </div>

                <div class="card-footer bg-light border-top-0 d-flex justify-content-center gap-2 px-3 pb-3 pt-2">
                    <!-- Edit Button -->
                   <button type="button" class="btn btn-sm d-flex align-items-center justify-content-center gap-1 text-dark"
                        style="background-color: white; border: 1px solid #ccc; border-radius: 999px; min-width: 100px; height: 36px;"
                        data-bs-toggle="modal" data-bs-target="#editModal-{{ $product->id }}">
                        <i class="fas fa-edit"></i> Edit
                    </button>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-sm d-flex align-items-center justify-content-center gap-1 text-white"
                            style="background-color: #dc3545; border-radius: 999px; min-width: 100px; height: 36px;">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
         
        <!-- Modal for Editing Product -->
        <div class="modal fade" id="editModal-{{ $product->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-4">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Change Image (optional)</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Product</button>
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

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title" id="addProductModalLabel">
                    <i class="fas fa-box-open me-2"></i> Add New Product
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- Session Error -->
            @if (session('error'))
            <div class="alert alert-danger m-3">{{ session('error') }}</div>
            @endif

            <!-- Modal Body -->
            <div class="modal-body px-4 py-4">
                <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Product Name</label>
                            <input type="text" name="name" class="form-control border-0 shadow-sm" placeholder="e.g. Shopee Sneakers" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control border-0 shadow-sm" placeholder="₱1999" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Stock</label>
                            <input type="number" name="stock" class="form-control border-0 shadow-sm" placeholder="e.g. 100" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" class="form-control border-0 shadow-sm" rows="3" placeholder="Write product description..."></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Product Image</label>
                            <input type="file" name="image" class="form-control border-0 shadow-sm" required>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer px-4 pb-4">
                        <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            alert.style.display = 'none';
        });
    }, 6000);
</script>