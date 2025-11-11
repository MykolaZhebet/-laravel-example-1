<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneratePromptRequest extends FormRequest
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
            'image' => [
                'required',
                'file',
                'image',
                'mimes:jpeg,png,jpg,svg',
                'max:10240',
                'dimensions:min_width=100,min_height=100,max_width=10000,max_height=10000',
            ]
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'File is required',
            'image.file' => 'File must be valid',
            'image.mimes' => 'Image must be a file of type: jpeg, png, svg',
            'image.max' => 'Image may not be greater than 10Mb',
            'image.dimensions' => 'The image dimensions must be between 64x64 and 4096x4096'
        ];
    }
}
