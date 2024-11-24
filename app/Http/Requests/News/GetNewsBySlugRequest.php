<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class GetNewsBySlugRequest extends FormRequest
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
            'slug' => 'required|exists:news,slug',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->route('slug')
        ]);
    }
}
