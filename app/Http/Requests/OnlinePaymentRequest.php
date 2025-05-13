<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlinePaymentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'class' => 'required|in:1st,2nd,3rd',
            'ticket_duration' => 'required|in:M,Q',
            // 'home_station' => ['required', 'string', 'exists:stations,station_name'],
            // 'work_station' => ['required', 'string', 'exists:stations,station_name', 'different:start_station'],
        ];
    }
}
