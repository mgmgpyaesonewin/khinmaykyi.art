<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
         if (Auth::user() && Auth::user()->admin == 1) {

            return true;

        }

        return false;

    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'image|mimes:png,jpg,jpeg|max:5000',   
            'title' => 'required',
            'price'=> 'required',
            'detail'=>'required',
            'sold_out'=>'required'
        ];
    }
}
