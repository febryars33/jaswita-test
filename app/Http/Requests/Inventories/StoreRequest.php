<?php

namespace App\Http\Requests\Inventories;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Takielias\TablarKit\Rules\FilepondRule;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id'   =>  [
                'required',
                'exists:' . Category::class . ',id'
            ],
            'name'  =>  [
                'required'
            ],
            'description'  =>  [
                'required'
            ],
            'image' =>  [
                new FilepondRule(['required', 'image'])
            ]
        ];
    }
}
