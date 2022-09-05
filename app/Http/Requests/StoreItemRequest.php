<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'code' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'category_id' => ['required', 'max:255'],
            'group_id' => ['required', 'max:255'],
            'description' => ['required'],
        ];
    }
}
