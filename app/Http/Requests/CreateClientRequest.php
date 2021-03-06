<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',

            'email' => 'required|email|unique:clients,email',
            'password' => 'required|confirmed' ,
            'phone' => 'required',
            'commercial_number' => 'required',
            'nationality_id' => 'required',


        ];

        return $rules;
    }
}
