@extends('admin.layout.admin_app')

@section('content')
<div class="content-scrollable px-4 py--5" style="font-family: 'Poppins', sans-serif;">
    <h2 class="fw-bold mb-4 text-primary">
        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
    </h2>

    {{-- Summary Cards --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card border-primary shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white rounded-circle p-3 me-3">
                        <i class="fas fa-box fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Products</h6>
                        <h4 class="fw-bold mb-0">120</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-primary shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-success text-white rounded-circle p-3 me-3">
                        <i class="fas fa-shopping-cart fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Orders</h6>
                        <h4 class="fw-bold mb-0">245</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-primary shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-warning text-white rounded-circle p-3 me-3">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Users</h6>
                        <h4 class="fw-bold mb-0">89</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-primary shadow-sm rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-danger text-white rounded-circle p-3 me-3">
                        <i class="fas fa-money-bill-wave fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Sales</h6>
                        <h4 class="fw-bold mb-0">₱75,000</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Section --}}
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card border-primary shadow-sm rounded-4 p-3">
                <h5 class="fw-semibold mb-3 text-primary">Sales This Week</h5>
                <canvas id="salesChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-primary shadow-sm rounded-4 p-3">
                <h5 class="fw-semibold mb-3 text-primary">Orders per Category</h5>
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Recent Orders --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white fw-semibold d-flex align-items-center gap-2">
            <i class="fas fa-clock text-primary"></i>
            <span class="fs-5 text-primary">Recent Orders</span>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-light text-uppercase small text-secondary">
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#ORD-1001</td>
                            <td>July 28, 2025</td>
                            <td><span class="badge bg-success rounded-pill">Completed</span></td>
                            <td>₱1,500.00</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    <i class="fas fa-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>#ORD-1002</td>
                            <td>July 29, 2025</td>
                            <td><span class="badge bg-warning text-dark rounded-pill">Pending</span></td>
                            <td>₱720.00</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    <i class="fas fa-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Sales Chart - Line
    const salesChart = new Chart(document.getElementById('salesChart'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: '₱ Sales',
                data: [1200, 1900, 3000, 2500, 2200, 2700, 3200],
                fill: true,
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                borderColor: '#007bff',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Category Chart - Pie
    const categoryChart = new Chart(document.getElementById('categoryChart'), {
        type: 'doughnut',
        data: {
            labels: ['Electronics', 'Fashion', 'Beauty', 'Home'],
            datasets: [{
                label: 'Orders',
                data: [300, 150, 100, 200],
                backgroundColor: ['#007bff', '#ffc107', '#28a745', '#dc3545']
            }]
        },
        options: {
            responsive: true,
            cutout: '70%',
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endpush
