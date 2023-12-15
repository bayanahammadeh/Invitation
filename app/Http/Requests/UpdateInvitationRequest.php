<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvitationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email1' => 'required|unique:invitations,email1,' . $this->id,
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email1.unique' => 'Email Must Be unique',
        ];
    }
}
