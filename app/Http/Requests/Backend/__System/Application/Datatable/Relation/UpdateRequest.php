<?php

namespace App\Http\Requests\Backend\__System\Application\Datatable\Relation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
        'name' => ['required', 'max:3', Rule::unique('system_application_table_relations')->ignore($this->id)],
  ];
    }
}
