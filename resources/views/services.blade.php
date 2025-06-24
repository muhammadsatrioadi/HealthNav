@extends('layouts.shared')

@push('styles')
<style>
    .icon-box {
        width: 100px;
        height: 100px;
        line-height: 100px;
        border-radius: 50%;
        background-color: #f8f9fa;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .icon-box i {
        font-size: 3rem;
    }
    .card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }
</style>
@endpush

@section('content')

<section class="container my-5">
    <h1 class="mb-4">Our Services</h1>

    <p class="lead mb-5">At HealthNav, we are committed to providing comprehensive healthcare navigation services designed to meet your needs. Our primary services include:</p>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="icon-box mb-4">
                        <i class="fas fa-stethoscope fa-4x text-primary"></i>
                    </div>
                    <h3 class="card-title mb-3">Medical Check-Up Packages</h3>
                    <p class="card-text text-muted">We offer a variety of medical check-up packages tailored to different health needs and budgets. From basic screenings to comprehensive health assessments, ensuring you stay proactive about your well-being.</p>
                    <a href="{{ route('hospitals.selection') }}" class="btn btn-outline-primary mt-3">Explore Packages</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="icon-box mb-4">
                        <i class="fas fa-hospital-alt fa-4x text-success"></i>
                    </div>
                    <h3 class="card-title mb-3">Hospital Directory</h3>
                    <p class="card-text text-muted">Access a curated list of our trusted partner hospitals. Find detailed information, specialties, and contact details to choose the best healthcare provider for your needs.</p>
                    <a href="{{ route('hospitals.index') }}" class="btn btn-outline-success mt-3">View Hospitals</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="icon-box mb-4">
                        <i class="fas fa-calendar-check fa-4x text-info"></i>
                    </div>
                    <h3 class="card-title mb-3">Appointment Booking</h3>
                    <p class="card-text text-muted">Easily schedule and manage your medical appointments online. Our intuitive booking system ensures a hassle-free experience, allowing you to focus on your health.</p>
                    <a href="{{ route('hospitals.selection') }}" class="btn btn-outline-info mt-3">Book Appointment</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="icon-box mb-4">
                        <i class="fas fa-history fa-4x text-warning"></i>
                    </div>
                    <h3 class="card-title mb-3">Medical History Tracking</h3>
                    <p class="card-text text-muted">Keep track of your past medical check-ups and appointments. Our system securely stores your health records, making it easy to review your progress and share with healthcare professionals.</p>
                    <a href="{{ route('user.mcu.history') }}" class="btn btn-outline-warning mt-3">View History</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="icon-box mb-4">
                        <i class="fas fa-user-shield fa-4x text-danger"></i>
                    </div>
                    <h3 class="card-title mb-3">Privacy & Security</h3>
                    <p class="card-text text-muted">We prioritize your data privacy and security. Our platform uses advanced encryption and strict privacy policies to ensure your personal and health information is protected.</p>
                    <a href="{{ route('privacy') }}" class="btn btn-outline-danger mt-3">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <div class="icon-box mb-4">
                        <i class="fas fa-headset fa-4x text-secondary"></i>
                    </div>
                    <h3 class="card-title mb-3">Customer Support</h3>
                    <p class="card-text text-muted">Our dedicated customer support team is here to assist you with any questions or concerns. Get timely help through our chatbot or contact us directly.</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-secondary mt-3">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection