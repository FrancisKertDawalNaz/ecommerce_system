@extends('admin.layout.admin_app')

@section('content')
<div class="container mt-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary mb-0">
            <i class="fas fa-star me-2"></i> Customer Reviews
        </h2>
    </div>

    <!-- Review List -->
    <div class="row g-3">
        <!-- Review Card 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0 fw-semibold">Juan Dela Cruz</h6>
                            <small class="text-muted">Reviewed: Shopee Sneakers</small>
                        </div>
                    </div>

                    <!-- Star Rating -->
                    <div class="mb-2 text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <!-- Review Comment -->
                    <p class="text-muted small mb-0">
                        "Very good quality shoes! Comfortable and fast delivery. Highly recommended."
                    </p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-end gap-2">
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        <i class="fas fa-eye me-1"></i> View
                    </button>
                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                        <i class="fas fa-trash me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Review Card 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-circle me-3" width="40" height="40">
                        <div>
                            <h6 class="mb-0 fw-semibold">Maria Santos</h6>
                            <small class="text-muted">Reviewed: Wireless Headphones</small>
                        </div>
                    </div>

                    <!-- Star Rating -->
                    <div class="mb-2 text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>

                    <!-- Review Comment -->
                    <p class="text-muted small mb-0">
                        "Sound is okay but the battery life could be better. Good for its price."
                    </p>
                </div>
                <div class="card-footer bg-white border-0 d-flex justify-content-end gap-2">
                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3">
                        <i class="fas fa-eye me-1"></i> View
                    </button>
                    <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                        <i class="fas fa-trash me-1"></i> Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Add more cards manually if needed -->
    </div>
</div>
@endsection
