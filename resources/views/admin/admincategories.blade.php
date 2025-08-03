@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="fas fa-layer-group me-2"></i> Categories
        </h2>
        <button class="btn btn-primary px-4 rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fas fa-plus me-1"></i> Add Category
        </button>
    </div>

    <!-- Example Category List -->
    <div class="row g-3">
        <!-- Example Card: You can loop through categories here -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="bg-light p-2 rounded-circle me-3">
                            <i class="fas fa-tag text-primary"></i>
                        </div>
                        <h5 class="mb-0 fw-semibold">Electronics</h5>
                    </div>
                    <p class="text-muted small">Gadgets, phones, and accessories.</p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-end gap-2">
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        <i class="fas fa-edit me-1"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                        <i class="fas fa-trash me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>
        <!-- Loop ends -->
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow rounded-4">
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title" id="addCategoryModalLabel">
                        <i class="fas fa-plus-circle me-2"></i> Add New Category
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label fw-semibold">Category Name</label>
                            <input type="text" class="form-control border-0 shadow-sm" id="categoryName" name="name" placeholder="e.g. Men's Fashion" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control border-0 shadow-sm" id="categoryDescription" name="description" rows="3" placeholder="Short description here..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
