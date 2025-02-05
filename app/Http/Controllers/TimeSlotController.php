<?php

namespace App\Http\Controllers;

use App\Models\Psychologist;
use App\Models\TimeSlot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index($psychologistId): JsonResponse
    {
        return response()->json(TimeSlot::where('psychologist_id', $psychologistId)->where('is_booked', false)->get(), 200);
    }

    public function store(Request $request, $psychologistId): JsonResponse
    {
        if (!Psychologist::find($psychologistId)) {
            return response()->json(['error' => 'Psychologist not found'], 404);
        }

        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time|different:start_time',
        ]);

        $overlappingSlot = TimeSlot::where('psychologist_id', $psychologistId)
            ->where(function($query) use ($request) {
                $query->where('start_time', '<', $request->end_time)
                    ->where('end_time', '>', $request->start_time);
            })
            ->exists();

        if ($overlappingSlot) {
            return response()->json(['error' => 'The time slot overlaps with an existing one.'], 400);
        }

        $timeSlot = TimeSlot::create([
            'psychologist_id' => $psychologistId,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return response()->json($timeSlot, 201);
    }

    public function update($id): JsonResponse
    {
        $timeSlot = TimeSlot::findOrFail($id);
        $timeSlot->is_booked = true;
        return response()->json($timeSlot, 200);
    }

    public function destroy($id): JsonResponse
    {
        TimeSlot::destroy($id);
        return response()->json(['message' => 'Time slot deleted'], 200);
    }
}
