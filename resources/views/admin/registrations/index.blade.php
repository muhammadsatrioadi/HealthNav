@extends('layouts.shared')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4 mb-0">MCU Registrations</h1>
        <a href="{{ route('admin.registrations.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-2"></i>Create New Registration
        </a>
    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">MCU Registrations</li>
    </ol>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Registrations
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="registrationsTable">
                    <thead>
                        <tr>
                            <th>Registration No.</th>
                            <th>Patient Name</th>
                            <th>Hospital</th>
                            <th>Package</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registrations as $registration)
                        <tr>
                            <td>{{ $registration->registration_number }}</td>
                            <td>{{ $registration->user->name }}</td>
                            <td>{{ $registration->hospital->name }}</td>
                            <td>{{ ucfirst($registration->mcu_package) }}</td>
                            <td>{{ $registration->appointment_date->format('d M Y') }} {{ \Carbon\Carbon::parse($registration->appointment_time)->format('H:i') }}</td>
                            <td>
                                <span class="badge bg-{{ $registration->status === 'completed' ? 'success' : ($registration->status === 'confirmed' ? 'primary' : ($registration->status === 'cancelled' ? 'danger' : 'warning')) }}">
                                    {{ ucfirst($registration->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.registrations.show', $registration->id) }}" class="btn btn-sm btn-info me-1">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.registrations.edit', $registration->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.registrations.destroy', $registration->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this registration?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No registrations found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $registrations->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTables
        $('#registrationsTable').DataTable({
            "order": [[4, "desc"]], // Sort by appointment date by default
            "pageLength": 15,
            "searching": true,
            "responsive": true
        });
    });
</script>
@endpush
@endsection 