@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-4 text-primary">
            <i class="fas fa-bag-shopping me-2"></i> Product Management
        </h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="fas fa-plus me-1"></i> Add Product
        </button>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header modal-header-modern">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body px-4 py-4">
                <form>
                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" placeholder="Example: Shopee Sneakers">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" placeholder="₱1999">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option disabled selected>Select category</option>
                                <option>Shoes</option>
                                <option>Electronics</option>
                                <option>Clothing</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Stock</label>
                            <input type="number" class="form-control" placeholder="e.g. 100">
                        </div>

                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Write product description..."></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control">
                        </div>

                    </div>
                </form>
            </div>

            <div class="modal-footer px-4 pb-4">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-modern rounded-pill px-4">Save Product</button>
            </div>
        </div>
    </div>
</div>

@endsection