<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'body' => 'required|string',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:draft,published,archived',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Post title is required',
            'user_id.required' => 'User ID is required',
            'user_id.exists' => 'User ID must exist in users table',
            'status.required' => 'Post status is required',
            'status.in' => 'Post status must be one of the following: draft, published, archived',
            'body.required' => 'Post body is required',
        ];
}
}
