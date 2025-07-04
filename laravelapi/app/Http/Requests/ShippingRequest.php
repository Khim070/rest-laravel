<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
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
            "order_id" => "nullable|integer",
            "user_id" => "nullable|integer",
            "address" => "nullable|string",
            "status" => "nullable|string|max:20",
            "tracking_number" => "nullable|string|max:20",
            "active" => "nullable|tinyinteger",
            "display" => "nullable|tinyinteger"
        ];
    }
}
