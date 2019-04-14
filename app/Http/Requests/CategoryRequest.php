<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        return [
             'name' => 'required|string|min:5|max:50',
            'description' => 'min:5|nullable|string'
        ];
    }

    // public function withValidator($validator)
    // {
    //     if(!$validator->fails()){
    //         // return redirect()->back();
    //         $validator->after(function ($validator){
                
    //             if(!$this->checkAvailable($this->input(['name', 'description']))){
    //                 $validator->errors()->add('unavailable', 'The dates you selected are busy!');
    //                 return redirect('/kategori');
    //             }
    //         });
    //     }
    // }

    public function response()
    {
        // Optionally, send a custom response on authorize failure 
        // (default is to just redirect to initial page with errors)
        // 
        // Can return a response, a view, a redirect, or whatever else

        // if ($this->ajax() || $this->wantsJson())
        // {
        //     return new JsonResponse($errors, 422);
        // }
        // return $this->redirector->to('login')
        //      ->withInput($this->except($this->dontFlash))
        //      ->withErrors($errors, $this->errorBag);

             return redirect('/kategori');
    }

    
}
