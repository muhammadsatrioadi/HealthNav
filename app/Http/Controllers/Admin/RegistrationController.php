<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\McuRegistration;
use App\Models\User;
use App\Models\Hospital;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $registrations = McuRegistration::with(['user', 'hospital'])
            ->latest()
            ->paginate(10);
        return view('admin.registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'user')->get();
        $hospitals = Hospital::all();
        $mcuPackages = ['basic', 'standard', 'premium'];
        $statuses = ['pending', 'confirmed', 'completed', 'cancelled'];
        $paymentStatuses = ['unpaid', 'paid', 'refunded'];

        return view('admin.registrations.create', compact('users', 'hospitals', 'mcuPackages', 'statuses', 'paymentStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'mcu_package' => 'required|in:basic,standard,premium',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'medical_notes' => 'nullable|string|max:1000',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'total_cost' => 'required|numeric|min:0',
            'payment_status' => 'required|in:unpaid,paid,refunded',
        ]);

        $validated['registration_number'] = McuRegistration::generateRegistrationNumber();

        McuRegistration::create($validated);

        return redirect()->route('admin.registrations.index')
            ->with('success', 'MCU Registration created successfully.');
    }

    public function show(McuRegistration $registration)
    {
        $registration->load(['user', 'hospital']);
        return view('admin.registrations.show', compact('registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(McuRegistration $registration)
    {
        $users = User::where('role', 'user')->get();
        $hospitals = Hospital::all();
        $mcuPackages = ['basic', 'standard', 'premium'];
        $statuses = ['pending', 'confirmed', 'completed', 'cancelled'];
        $paymentStatuses = ['unpaid', 'paid', 'refunded'];

        return view('admin.registrations.edit', compact('registration', 'users', 'hospitals', 'mcuPackages', 'statuses', 'paymentStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, McuRegistration $registration)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'mcu_package' => 'required|in:basic,standard,premium',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'medical_notes' => 'nullable|string|max:1000',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'total_cost' => 'required|numeric|min:0',
            'payment_status' => 'required|in:unpaid,paid,refunded',
        ]);

        $registration->update($validated);

        return redirect()->route('admin.registrations.index')
            ->with('success', 'MCU Registration updated successfully.');
    }

    /**
     * Update the status of the specified registration.
     */
    public function updateStatus(Request $request, McuRegistration $registration)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,confirmed,completed,cancelled'],
        ]);

        $registration->update($validated);

        return response()->json(['success' => true, 'message' => 'Registration status updated successfully.']);
    }

    public function destroy(McuRegistration $registration)
    {
        $registration->delete();

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Registration deleted successfully.');
    }
} 