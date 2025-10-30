@extends('layouts.admin')

@section('admin-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><i class="fas fa-hospital me-1"></i> Hospital Management</div>
                        <a href="{{ route('admin.hospitals.create') }}" class="btn btn-sm" style="background: linear-gradient(90deg, var(--gold) 0%, var(--terracotta) 100%); color: var(--cream); border: none;">
                            <i class="fas fa-plus"></i> Add Hospital
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentHospitals ?? [] as $hospital)
                                <tr>
                                    <td>{{ $hospital->name ?? 'N/A' }}</td>
                                    <td>{{ $hospital->phone ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.hospitals.edit', $hospital) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No hospitals found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-3">
                        <a href="{{ route('admin.hospitals.index') }}" class="btn" style="background: linear-gradient(90deg, var(--gold) 0%, var(--terracotta) 100%); color: var(--cream); border: none;">
                            <i class="fas fa-list"></i> View All Hospitals
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><i class="fas fa-users me-1"></i> User Management</div>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-sm" style="background: linear-gradient(90deg, var(--gold) 0%, var(--terracotta) 100%); color: var(--cream); border: none;">
                            <i class="fas fa-plus"></i> Add User
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentUsers ?? [] as $user)
                                <tr>
                                    <td>{{ $user->name ?? 'N/A' }}</td>
                                    <td>{{ $user->email ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No users found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-3">
                        <a href="{{ route('admin.users.index') }}" class="btn" style="background: linear-gradient(90deg, var(--gold) 0%, var(--terracotta) 100%); color: var(--cream); border: none;">
                            <i class="fas fa-list"></i> View All Users
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background: var(--brown);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">{{ $totalRegistrations ?? 0 }}</h4>
                            <div class="small">Total Registrations</div>
                        </div>
                        <div>
                            <i class="fas fa-clipboard-list fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admin.registrations.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background: var(--green); color: var(--brown);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">{{ $completedMcus }}</h4>
                            <div class="small">Completed MCUs</div>
                        </div>
                        <div>
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admin.registrations.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background: var(--gold); color: var(--brown);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">{{ $pendingMcus }}</h4>
                            <div class="small">Pending MCUs</div>
                        </div>
                        <div>
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admin.registrations.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background: var(--terracotta);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">{{ $totalUsers }}</h4>
                            <div class="small">Total Users</div>
                        </div>
                        <div>
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('admin.users.index') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    MCU Package Distribution
                </div>
                <div class="card-body">
                    <canvas id="packageChart" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Registration Status Distribution
                </div>
                <div class="card-body">
                    <canvas id="statusChart" width="100%" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Registrations -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Recent Registrations
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Hospital</th>
                            <th>Package</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentRegistrations ?? [] as $registration)
                        <tr>
                            <td>{{ $registration->user->name ?? 'N/A' }}</td>
                            <td>{{ $registration->hospital->name ?? 'N/A' }}</td>
                            <td>{{ ucfirst($registration->mcu_package) ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $registration->status === 'completed' ? 'success' : ($registration->status === 'pending' ? 'warning' : 'info') }}">
                                    {{ ucfirst($registration->status) }}
                                </span>
                            </td>
                            <td>{{ $registration->created_at ? $registration->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.registrations.show', $registration->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No registrations found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Package Distribution Chart
    var packageCtx = document.getElementById('packageChart').getContext('2d');
    var packageData = @json($packageDistribution);
    new Chart(packageCtx, {
        type: 'pie',
        data: {
            labels: ['Basic', 'Standard', 'Premium'],
            datasets: [{
                data: packageData,
                backgroundColor: ['#9CAF88', '#E3C16F', '#6B4B33']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Status Distribution Chart
    var statusCtx = document.getElementById('statusChart').getContext('2d');
    var statusData = @json($statusDistribution);
    new Chart(statusCtx, {
        type: 'bar',
        data: {
            labels: ['Pending', 'Confirmed', 'Completed', 'Cancelled'],
            datasets: [{
                label: 'Number of Registrations',
                data: statusData,
                backgroundColor: ['#E3C16F', '#9CAF88', '#6B4B33', '#A1653B']
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush

@endsection 