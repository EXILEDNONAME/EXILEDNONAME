<?php

namespace App\Http\Requests\Backend\__System\Administrative\Management\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
      'phone' => 'required|unique:users',
      'username' => 'required|unique:users',
      'email' => 'required|unique:users',
  ];
    }
}
