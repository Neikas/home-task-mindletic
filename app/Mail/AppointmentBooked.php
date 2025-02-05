<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentBooked extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private readonly Appointment $appointment)
    {
        //
    }

    public function build()
    {
        return $this->subject('Appointment Confirmation')
            ->view('emails.appointment_booked')
            ->with([
                'client_name' => $this->appointment->client_name,
                'start_time' => $this->appointment->timeSlot->start_time,
                'end_time' => $this->appointment->timeSlot->end_time,
            ]);
    }
}
