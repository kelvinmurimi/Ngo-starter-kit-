<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
            //
            'caption' => 'nullable|string|max:255|required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:600000',
            //description
            'description' => 'nullable|string|required',
            //tag
            'tag_id' => 'required|exists:tags,id',

        ];
    }
}
