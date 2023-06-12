<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:projects', 'max:50'],
            'made_by' => ['required', 'max:100'],
            'description' => ['nullable', 'max:255'],
            'creation_date' => ['nullable'],
            'cover' => ['nullable', 'image', 'max:955'],
            'link' => ['nullable'],
            'code_link' => ['nullable'],
            'trace' => ['nullable', 'max:255'],
            'type_id' => ['exists:types,id'],
            'technology_id' => ['exists:technologies,id'],

        ];
    }
}