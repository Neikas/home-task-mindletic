<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PsychologistController;
use App\Http\Controllers\TimeSlotController;
use Illuminate\Support\Facades\Route;

// sanctum middleware
//Route::middleware('auth:sanctum')->group(function () {
    Route::get('psychologists/{id}/time-slots', [TimeSlotController::class, 'index']);
    Route::post('psychologists/{id}/time-slots', [TimeSlotController::class, 'store']);
    Route::apiResource('psychologists', PsychologistController::class)->only(['store', 'index']);
//});


Route::put('time-slots/{id}', [TimeSlotController::class, 'update']);
Route::delete('time-slots/{id}', [TimeSlotController::class, 'destroy']);

Route::apiResource('appointments', AppointmentController::class)->only(['store', 'index']);
