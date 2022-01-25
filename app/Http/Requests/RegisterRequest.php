<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'no_ca' => 'required',
            'password' => 'required',
            'checkbox-1' => 'required',
            'checkbox-2' => 'required',
            'checkbox-3' => 'required',
            'checkbox-4' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'checkbox-1.required' => 'Pernyataan 1 wajib dicentang',
            'checkbox-2.required' => 'Pernyataan 2 wajib dicentang',
            'checkbox-3.required' => 'Pernyataan 3 wajib dicentang',
            'checkbox-4.required' => 'Pernyataan 4 wajib dicentang',
            'no_ca' => 'No. CA wajib diisi',
            'email.unique' => 'Email telah digunakan',
        ];
    }
}
