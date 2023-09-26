<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberStoreRequest extends FormRequest
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
            'unique_id' => 'required|unique:members',
            'account_no' => 'required|unique:members',
            'full_name' => 'required|string',
            'nic' => 'required|numeric|unique:members',
            'mobile' => 'required|numeric',
            'relation_name' => 'required|string',
            'relation_nic' => 'required|string',
            'relation_mobile' => 'required|string',
            'address' => 'required|string',
            'relationship' => 'required|string',
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'email.required' => 'Email is required!',
            // 'name.required' => 'Name is required!',
            // 'password.required' => 'Password is required!'
        ];
    }
}
