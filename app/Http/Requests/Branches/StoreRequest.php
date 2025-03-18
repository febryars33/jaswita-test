<?php

namespace App\Http\Requests\Branches;

use App\Models\Branch;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'manager_nik'  =>  [
                'required', 'digits:16'
            ],
            'manager_name'  =>  [
                'required'
            ],
            'manager_address'  =>  [
                'required'
            ],
            'manager_email'  =>  [
                'required'
            ],
            'manager_password'  =>  [
                'required'
            ],
            'code'  =>  [
                'required', 'unique:' . Branch::class . ',code'
            ],
            'name'  =>  [
                'required'
            ],
            'address'  =>  [
                'required'
            ],
            'province_id'  =>  [
                'required'
            ],
            'regency_id'  =>  [
                'required'
            ],
            'district_id'  =>  [
                'required'
            ],
            'sub_district_id'  =>  [
                'required'
            ],
            'phone'  =>  [
                'required'
            ],
            'email'  =>  [
                'required'
            ],
        ];
    }
}
