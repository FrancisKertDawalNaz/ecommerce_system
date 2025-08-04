@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary mb-0">
            <i class="fas fa-bag-shopping me-2"></i> Product Management
        </h2>
        <button class="btn btn-primary px-4 rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus me-1"></i> Add Product
        </button>
    </div>

    @if(isset($products) && $products->isNotEmpty())
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>₱ Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if ($product->image_url)
                        <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" width="80">
                        @else
                        <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>{{ $product->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-muted">No products found.</p>
    @endif
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
