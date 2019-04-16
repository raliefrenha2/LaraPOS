<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'name' => 'required|string|max:100' 
        ];

        if (request()->isMethod('put')) {
            $rules['email'] = 'required|email|exists:users,email';
            $rules['password'] ='nullable|min:6';
        }
        if (request()->isMethod('post')) {
            $rules['email'] = 'required|email|unique:users';
            $rules['password'] ='required|min:6';
            $rules['role'] = 'required|string|exists:roles,name';
        }

        // dd($rules);

        return $rules;

    }


}
