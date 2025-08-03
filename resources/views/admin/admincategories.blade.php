@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="fas fa-layer-group me-2"></i> Categories
        </h2>
        <button class="btn btn-primary px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fas fa-plus me-1"></i> Add Category
        </button>
    </div>

    <!-- Modal -->
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
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label fw-semibold">Category Name</label>
                            <input type="text" class="form-control" id="categoryName" name="name" placeholder="Enter category name" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="categoryDescription" name="description" rows="3" placeholder="Enter category description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
