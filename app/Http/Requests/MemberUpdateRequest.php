<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberUpdateRequest extends FormRequest
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
            'full_name' => 'required|string',
            'nic' => 'required|numeric|unique:members,nic,'.$this->id,
            'mobile' => 'required|numeric',
            'relation_name' => 'required|string',
            'relation_nic' => 'required|string',
            'relation_mobile' => 'required|string',
            'address' => 'required|string',
            'relationship' => 'required|string',
        ];
    }
}
