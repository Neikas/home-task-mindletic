<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Mail\AppointmentBooked;
use App\Models\Appointment;
use App\Models\TimeSlot;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Appointment::with('timeSlot')->get(), 200);
    }

    public function store(StoreAppointmentRequest $request): JsonResponse
    {
        $timeSlot = TimeSlot::findOrFail($request->time_slot_id);
        if ($timeSlot->is_booked) {
            return response()->json(['error' => 'Time slot already booked'], 400);
        }

        $appointment = Appointment::create($request->all());
        $timeSlot->update(['is_booked' => true]);

        Mail::to($request->client_email)->send(new AppointmentBooked($appointment));

        return response()->json($appointment, 201);
    }
}
