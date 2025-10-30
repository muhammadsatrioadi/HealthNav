@extends('layouts.shared')

@push('styles')
<style>
    :root {
      --green: #9CAF88;
      --gold: #E3C16F;
      --brown: #6B4B33;
      --terracotta: #A1653B;
      --cream: #F8F3E9;
    }

    body {
      background-color: var(--cream);
    }

    .admin-sidebar {
        background: linear-gradient(135deg, var(--green) 0%, var(--gold) 100%);
        min-height: 100vh;
        color: var(--brown);
        border-right: 2px solid var(--green);
        padding-top: 2rem;
    }
    .admin-sidebar .nav-link {
        color: var(--brown);
        font-weight: 600;
        border-radius: 8px;
        margin-bottom: .5rem;
        transition: background 0.2s, color 0.2s;
    }
    .admin-sidebar .nav-link.active,
    .admin-sidebar .nav-link:focus,
    .admin-sidebar .nav-link:hover {
        background: var(--terracotta);
        color: var(--cream);
    }
    .admin-sidebar .nav-link i {
        color: var(--gold);
        margin-right: 0.5rem;
    }
    .admin-sidebar .nav-item + .nav-item {
        margin-top: 0.5rem;
    }
    main {
        background: var(--cream);
        min-height: 100vh;
        padding-top: 2rem;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Admin Sidebar -->
        <div class="col-md-3 col-lg-2 admin-sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('admin.hospitals.index') ? ' active' : '' }}" href="{{ route('admin.hospitals.index') }}">
                            <i class="fas fa-hospital"></i> Hospitals
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('admin.users.index') ? ' active' : '' }}" href="{{ route('admin.users.index') }}">
                            <i class="fas fa-users"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('admin.registrations.index') ? ' active' : '' }}" href="{{ route('admin.registrations.index') }}">
                            <i class="fas fa-clipboard-list"></i> Registrations
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Admin Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('admin-content')
        </main>
    </div>
</div>
@endsection 