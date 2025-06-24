@extends('layouts.shared')

@push('styles')
<style>
    .hospital-detail-header {
        background-color: #f8f9fa;
        padding: 3rem 0;
        margin-bottom: 3rem;
        border-bottom: 1px solid #e9ecef;
    }
    .hospital-image {
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .info-item {
        margin-bottom: 1rem;
    }
    .info-item i {
        color: #007bff;
        margin-right: 10px;
    }
    .section-title {
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 2rem;
    }
    .specialty-badge {
        background-color: #e9ecef;
        color: #495057;
        padding: 0.5em 0.8em;
        border-radius: 20px;
        font-size: 0.9em;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
        display: inline-block;
    }
    .gallery-item {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
    }
    .gallery-item:hover {
        transform: scale(1.02);
    }
</style>
@endpush

@section('content')
<section class="hospital-detail-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/hospital-placeholder.jpg') }}" alt="Hospital Image" class="img-fluid hospital-image">
            </div>
            <div class="col-md-8">
                <h1 class="display-4 mb-3">{{ $hospital->name ?? 'Nama Rumah Sakit' }}</h1>
                <p class="lead text-muted">{{ $hospital->description ?? 'Deskripsi singkat tentang rumah sakit.' }}</p>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i> {{ $hospital->address ?? 'Alamat Rumah Sakit' }}
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i> {{ $hospital->phone ?? 'Telepon Rumah Sakit' }}
                </div>
                <div class="info-item">
                    <i class="fas fa-star text-warning"></i> {{ number_format($hospital->rating ?? 0, 1) }} ({{ $hospital->reviews_count ?? 0 }} Reviews)
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="section-title">About This Hospital</h2>
            <p class="mb-4">{{ $hospital->full_description ?? 'Ini adalah deskripsi lengkap tentang rumah sakit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.' }}</p>

            <h3 class="section-title">Key Specialties</h3>
            <div class="mb-4">
                @forelse ($hospital->specialties ?? [] as $specialty)
                    <span class="specialty-badge">{{ $specialty }}</span>
                @empty
                    <p class="text-muted">No specialties listed.</p>
                @endforelse
            </div>

            <h3 class="section-title">Location</h3>
            <div class="mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.250552349079!2d110.36630861477797!3d-7.77093289440625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57a5c89c8901%3A0xf6d7e2e3f5a7a7a7!2sUniversitas%20Gadjah%20Mada!5e0!3m2!1sen!2sid!4v1628123456789!5m2!1sen!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <h3 class="section-title">Gallery</h3>
            <div class="row g-3 mb-4">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="col-md-4">
                        <img src="{{ asset('assets/images/gallery-placeholder.jpg') }}" class="img-fluid gallery-item" alt="Gallery Image {{ $i }}">
                    </div>
                @endfor
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm p-4 sticky-top" style="top: 80px;">
                <h3 class="mb-3">Book an Appointment</h3>
                <p class="text-muted mb-4">Ready to book your medical check-up at {{ $hospital->name ?? 'this hospital' }}?</p>
                <a href="{{ route('hospitals.selection', ['hospital_id' => $hospital->id ?? '']) }}" class="btn btn-primary btn-lg w-100">Book Now</a>
            </div>
        </div>
    </div>
</section>
@endsection 