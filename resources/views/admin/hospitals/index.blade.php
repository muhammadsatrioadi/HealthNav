@extends('layouts.shared')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Hospitals Management</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Hospitals</li>
    </ol>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                <i class="fas fa-hospital me-1"></i>
                Hospitals List
            </span>
            <a href="{{ route('admin.hospitals.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New Hospital</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hospitals as $hospital)
                            <tr>
                                <td>{{ $hospital->id }}</td>
                                <td>
                                    @if ($hospital->image_url)
                                        <img src="{{ Storage::url($hospital->image_url) }}" alt="{{ $hospital->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                    @else
                                        <img src="{{ asset('assets/images/hospital-placeholder.jpg') }}" alt="No Image" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                    @endif
                                </td>
                                <td>{{ $hospital->name }}</td>
                                <td>{{ $hospital->location }}</td>
                                <td>{{ $hospital->phone }}</td>
                                <td>{{ $hospital->email }}</td>
                                <td>{{ number_format($hospital->rating, 1) }} ({{ $hospital->reviews_count }})</td>
                                <td>
                                    <span class="badge {{ $hospital->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $hospital->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.hospitals.show', $hospital->id) }}" class="btn btn-info btn-sm" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('admin.hospitals.edit', $hospital->id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.hospitals.destroy', $hospital->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this hospital?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No hospitals found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $hospitals->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection 