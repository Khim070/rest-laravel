<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            "amount" => "nullable|numeric",
            "payment_method" => "nullable|string|max:20",
            "status" => "nullable|string|max:20",
            "active" => "nullable|tinyinteger",
            "display" => "nullable|tinyinteger"
        ];
    }
}
