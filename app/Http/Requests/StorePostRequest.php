<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => [ "required", "string", "min:3", "max:255", "unique:posts,title"],
            "category_id" => [ "required", "numeric", "integer", "exists:categories,id"],
            "content" => [ "required", "string", "min:15"],
            "tags" => ["array"],
            "tags.*" => ["integer", "numeric", "exists:tags,id", "min:1"],
            "image" => ["nullable", "image", "max:250"]
        ];
    }
}
