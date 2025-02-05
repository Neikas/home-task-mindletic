<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'time_slot_id' => 'required|exists:time_slots,id',
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
        ];
    }

    /**
     * Get the custom error messages for validation.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'time_slot_id.required' => 'The time slot is required.',
            'time_slot_id.exists' => 'The selected time slot does not exist.',
            'client_name.required' => 'The client name is required.',
            'client_name.string' => 'The client name must be a valid string.',
            'client_name.max' => 'The client name may not be greater than 255 characters.',
            'client_email.required' => 'The client email is required.',
            'client_email.email' => 'The client email must be a valid email address.',
        ];
    }
}
