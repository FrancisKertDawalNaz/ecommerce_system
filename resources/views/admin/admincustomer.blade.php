@extends('admin.layout.admin_app')

@section('content')
<div class="content-scrollable px-4 py--5">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary mb-0">
            <i class="fas fa-users me-2"></i> Customers
        </h2>
    </div>
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- Customer Table -->
    <div class="card shadow-sm rounded-4 border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-uppercase small text-muted">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Joined</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                        <tr class="border-bottom">
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <span class="fw-semibold">{{ $customer->id }}</span>
                                </div>
                            </td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('F d, Y') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    @if ($customer->status === 'banned')
                                    {{-- Unban Button --}}
                                    <form action="{{ route('customers.unban', $customer->id) }}" method="POST" onsubmit="return confirm('Unban this user?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                            <i class="fas fa-user-check me-1"></i> Unban
                                        </button>
                                    </form>
                                    @else
                                    {{-- Ban Button --}}
                                    <form action="{{ route('customers.ban', $customer->id) }}" method="POST" onsubmit="return confirm('Ban this user?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                            <i class="fas fa-user-slash me-1"></i> Ban
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>


                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">No customers found.</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection