<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tour_package_id' => ['required', 'exists:tour_packages,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'travel_date' => ['required', 'date', 'after:today'],
            'number_of_people' => ['required', 'integer', 'min:1', 'max:50'],
            'special_requests' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'nama lengkap',
            'email' => 'alamat email',
            'phone' => 'nomor telepon',
            'travel_date' => 'tanggal perjalanan',
            'number_of_people' => 'jumlah peserta',
            'special_requests' => 'permintaan khusus',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'travel_date.after' => ':Attribute harus berupa tanggal setelah hari ini.',
        ];
    }
}
