<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolValidateRequest extends FormRequest
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
                'title' => 'required',
                'link' => 'required|url',
                'description' => 'required',
                'tags' => 'required|array',
                'tags.*' => 'required|string'
        ];
    }

    // customizando retorno
    // public function messages(): array
    // {
    //     return [
    //         'link.url' => 'o link precisa ser uma URL válida'
    //     ];
    // }
}
