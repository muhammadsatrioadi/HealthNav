@extends('layouts.shared')

@push('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #0056b3 0%, #003366 100%);
        padding: 4rem 0;
        color: white;
        margin-bottom: 2rem;
    }

    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
    }

    .quick-access-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
    }

    .quick-access-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .quick-access-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #0056b3;
    }

    .activity-item {
        padding: 1rem;
        border-left: 4px solid #0056b3;
        background: white;
        margin-bottom: 1rem;
        border-radius: 0 10px 10px 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .appointment-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-confirmed {
        background: #d4edda;
        color: #155724;
    }

    .card {
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .package-description {
        margin-bottom: 1rem;
        font-size: 0.95rem;
        color: #6c757d; /* text-muted color */
        min-height: 50px; /* Ensure consistent height */
    }
    .excursion-box {
        background-color: #3f4a56; /* Slightly lighter dark gray for the box */
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1.5rem;
        text-align: left;
    }
    .excursion-box h5 {
        color: white;
        margin-bottom: 0.75rem;
        font-size: 1.1rem;
    }
    .excursion-box ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .excursion-box ul li {
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }
    .excursion-box ul li:last-child {
        margin-bottom: 0;
    }

    .basic-excursion-text {
        color: #dc3545; /* Red */
    }
    .standard-excursion-text {
        color: #28a745; /* Green */
    }
    .premium-excursion-text {
        color: #007bff; /* Blue */
    }

    .price-btn {
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 25px; /* More rounded */
        font-size: 1.1rem;
        font-weight: 600;
        border: none;
        transition: background-color 0.2s ease;
    }

    .basic-price-btn {
        background-color: #dc3545; /* Red */
    }
    .basic-price-btn:hover {
        background-color: #c82333;
    }
    .standard-price-btn {
        background-color: #28a745; /* Green */
    }
    .standard-price-btn:hover {
        background-color: #218838;
    }
    .premium-price-btn {
        background-color: #007bff; /* Blue */
    }
    .premium-price-btn:hover {
        background-color: #0056b3;
    }

    .pricing-value {
        position: relative;
    }
    .pricing-value .text-muted,
    .pricing-value .text-white-50 {
        font-size: 1rem;
    }
    .features p {
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }
    .table th {
        font-weight: 500;
    }
    .table td {
        vertical-align: middle;
    }

    /* User Profile Dropdown */
    .navbar .user-profile-dropdown {
      display: flex;
      align-items: center;
      padding: 8px 12px;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s ease;
      background: white;
      min-width: 160px;
    }

    .navbar .user-profile-dropdown:hover {
      border-color: #d1d5db;
      background: #f9fafb;
    }

    .navbar .user-profile-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar .user-profile {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      overflow: hidden;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 mb-4">Welcome back, {{ Auth::user()->name }}!!!</h1>
                <p class="lead mb-4">Manage your medical check-ups and appointments all in one place.</p>
                <a href="{{ route('hospitals.selection') }}" class="btn btn-light btn-lg">Book New Appointment</a>
            </div>
            <div class="col-md-6 text-center d-none d-md-block">
                <img src="{{ asset('assets/images/dashboard-illustration.svg') }}" alt="--" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>



<!-- Quick Access Section -->
<section class="container mb-5">
    <h2 class="h3 mb-4">Quick Access</h2>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="quick-access-card">
                <i class="fas fa-calendar-plus quick-access-icon"></i>
                <h3 class="h5">Book MCU</h3>
                <p class="text-muted">Schedule your medical check-up</p>
                <a href="{{ route('hospitals.selection') }}" class="btn btn-outline-primary">Book Now</a>
            </div>
                    </div>
        <div class="col-md-3 mb-4">
            <div class="quick-access-card">
                <i class="fas fa-history quick-access-icon"></i>
                <h3 class="h5">MCU History</h3>
                <p class="text-muted">View your medical history</p>
                <a href="{{ route('user.mcu.history') }}" class="btn btn-outline-primary">View History</a>
                                </div>
                            </div>
        <div class="col-md-3 mb-4">
            <div class="quick-access-card">
                <i class="fas fa-user-edit quick-access-icon"></i>
                <h3 class="h5">Profile</h3>
                <p class="text-muted">Update your information</p>
                <a href="{{ route('user.profile.edit') }}" class="btn btn-outline-primary">Edit Profile</a>
                                </div>
                            </div>
        <div class="col-md-3 mb-4">
            <div class="quick-access-card">
                <i class="fas fa-hospital quick-access-icon"></i>
                <h3 class="h5">Hospitals</h3>
                <p class="text-muted">Browse partner hospitals</p>
                <a href="{{ route('hospitals.index') }}" class="btn btn-outline-primary">View All</a>
            </div>
        </div>
    </div>
</section>

<!-- Recent Activities and Upcoming Appointments -->
<section class="container mb-5">
    <div class="row">
        <!-- Recent Activities -->
        <div class="col-md-6 mb-4">
            <h2 class="h3 mb-4">Recent Activities</h2>
            @if(isset($recentActivities) && count($recentActivities) > 0)
                @foreach($recentActivities as $activity)
                    <div class="activity-item">
                        <h4 class="h6 mb-1">{{ $activity->title }}</h4>
                        <p class="text-muted mb-0">{{ $activity->description }}</p>
                        <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            @else
                <div class="text-center py-4">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No recent activities</p>
                </div>
            @endif
                </div>

        <!-- Upcoming Appointments -->
        <div class="col-md-6 mb-4">
            <h2 class="h3 mb-4">Upcoming Appointments</h2>
            @if(isset($upcomingAppointmentsList) && count($upcomingAppointmentsList) > 0)
                @foreach($upcomingAppointmentsList as $appointment)
                    <div class="appointment-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="h6 mb-0">{{ $appointment->hospital_name }}</h4>
                            <span class="status-badge {{ $appointment->status == 'confirmed' ? 'status-confirmed' : 'status-pending' }}">
                                {{ ucfirst($appointment->status) }}
                            </span>
                    </div>
                        <p class="text-muted mb-2">
                            <i class="far fa-calendar-alt me-2"></i>
                            {{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y, H:i') : 'Date not set' }}
                        </p>
                        <p class="text-muted mb-2">
                            <i class="fas fa-stethoscope me-2"></i>
                            {{ $appointment->package_name }}
                        </p>
                        <a href="{{ route('user.mcu.show', $appointment->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                    </div>
                @endforeach
            @else
                <div class="text-center py-4">
                    <i class="far fa-calendar-check fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No upcoming appointments</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- MCU Packages Section -->
<section class="container my-5">
    <div class="text-center mb-5">
        <h2 class="display-4 mb-3">Medical Check-Up Packages</h2>
        <p class="text-muted">Choose the perfect medical check-up package that suits your needs. Each package is designed to provide comprehensive health screening with different levels of examination.</p>
</div>

    <div class="row justify-content-center g-4">
        <!-- Basic Package -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm" style="background-color: #343a40; color: white;">
                <div class="card-body text-center p-4">
                    <h3 class="card-title text-white">Basic MCU</h3>
                    <p class="package-description">The Basic Medical Check-Up Package includes essential health assessments, such as measuring blood pressure and conducting basic:</p>
                    <div class="excursion-box">
                        <h5 class="basic-excursion-text">Excursions Included:</h5>
                        <ul>
                            <li class="basic-excursion-text">• Bukit Paralayang</li>
                            <li class="basic-excursion-text">• Malioboro</li>
                        </ul>
                    </div>
                    <a href="{{ route('hospitals.selection') }}" class="btn price-btn basic-price-btn w-100">Harga: Rp 500.000</a>
                </div>
            </div>
        </div>

        <!-- Standard Package -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow" style="background-color: #343a40; color: white;">
                <div class="card-body text-center p-4">
                    <h3 class="card-title text-white">Standard MCU</h3>
                    <p class="package-description">The Standard Medical Check-Up package includes all the assessments in the Basic package, plus additional comprehensive tests.</p>
                    <div class="excursion-box">
                        <h5 class="standard-excursion-text">Excursions Included:</h5>
                        <ul>
                            <li class="standard-excursion-text">• Bukit Paralayang</li>
                            <li class="standard-excursion-text">• Malioboro</li>
                            <li class="standard-excursion-text">• Candi Prambanan</li>
                        </ul>
                    </div>
                    <a href="{{ route('hospitals.selection') }}" class="btn price-btn standard-price-btn w-100">Harga: Rp 1.000.000</a>
                </div>
            </div>
        </div>

        <!-- Premium Package -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm" style="background-color: #343a40; color: white;">
                <div class="card-body text-center p-4">
                    <h3 class="card-title text-white">Premium MCU</h3>
                    <p class="package-description">The Premium Medical Check-Up package offers the most comprehensive health assessment, including all tests from the Basic and</p>
                    <div class="excursion-box">
                        <h5 class="premium-excursion-text">Excursions Included:</h5>
                        <ul>
                            <li class="premium-excursion-text">• Bukit Paralayang</li>
                            <li class="premium-excursion-text">• Malioboro</li>
                            <li class="premium-excursion-text">• Candi Prambanan</li>
                            <li class="premium-excursion-text">• Candi Borobudur</li>
                            <li class="premium-excursion-text">• Pantai Parangtritis</li>
                        </ul>
                    </div>
                    <a href="{{ route('hospitals.selection') }}" class="btn price-btn premium-price-btn w-100">Harga: Rp 2.500.000</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Patients Testimonials Section -->
<section class="container my-5">
    <div class="text-center mb-5">
        <h2 class="display-4 mb-3">Patients</h2>
        <p class="text-muted">Hear what our satisfied patients have to say about their experience with HealthNav.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/images/team/rara.jpg') }}" alt="Dara Amanda" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                    <div>
                        <h5 class="mb-0">Dara Amanda</h5>
                        <p class="text-muted mb-0">Lampung</p>
                    </div>
                </div>
                <p class="mb-0">HealthNav your travel companion for the best healthcare abroad! They have a safe, comfortable and quality service network. So, you can calm down and focus on recovery without worrying.</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/images/team/iqbaal.jpg') }}" alt="Iqbaal Ramadhan" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                    <div>
                        <h5 class="mb-0">Iqbaal Ramadhan</h5>
                        <p class="text-muted mb-0">Sleman</p>
                    </div>
                </div>
                <p class="mb-0">HealthNav has really helped my health journey! I felt safe, comfortable and received quality care abroad. Highly recommended for anyone seeking international medical services.</p>
            </div>
        </div>
    </div>
</section>

<!-- Hospital Registrations Overview -->
<!-- <div class="row">
    <div class="col-md-6 mb-4">
        <h2 class="h3 mb-4">Recent Activities</h2>
        @if(isset($recentActivities) && count($recentActivities) > 0)
            @foreach($recentActivities as $activity)
                <div class="activity-item">
                    <h4 class="h6 mb-1">{{ $activity->title }}</h4>
                    <p class="text-muted mb-0">{{ $activity->description }}</p>
                    <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        @else
            <div class="text-center py-4">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <p class="text-muted">No recent activities</p>
            </div>
        @endif
    </div>

    <div class="col-md-6 mb-4">
        <h2 class="h3 mb-4">Upcoming Appointments</h2>
        @if(isset($upcomingAppointmentsList) && count($upcomingAppointmentsList) > 0)
            @foreach($upcomingAppointmentsList as $appointment)
                <div class="appointment-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="h6 mb-0">{{ $appointment->hospital_name }}</h4>
                        <span class="status-badge {{ $appointment->status == 'confirmed' ? 'status-confirmed' : 'status-pending' }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                </div>
                    <p class="text-muted mb-2">
                        <i class="far fa-calendar-alt me-2"></i>
                        {{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y, H:i') : 'Date not set' }}
                    </p>
                    <p class="text-muted mb-2">
                        <i class="fas fa-stethoscope me-2"></i>
                        {{ $appointment->package_name }}
                    </p>
                    <a href="{{ route('user.mcu.show', $appointment->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                </div>
            @endforeach
        @else
            <div class="text-center py-4">
                <i class="far fa-calendar-check fa-3x text-muted mb-3"></i>
                <p class="text-muted">No upcoming appointments</p>
            </div>
        @endif
    </div>
</div> -->
@endsection