<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:articles,title',
            'content' => 'required|string',
            //'slug' => 'required|string|max:255|unique:articles,slug',
            // 'user_id' => 'required|exists:users,id',
            'tag_id' => 'required|exists:tags,id',
            'status' => 'required',
            'excerpt' => 'required',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ];
    }
}
