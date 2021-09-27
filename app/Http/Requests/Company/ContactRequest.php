<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'                => 'required',
            'email'               =>  'required|email|max:255|unique:companies',
            'addresses.telephone' =>'required|phone:Auto',

        ];


    }
    public function messages()
    {
        return[

               'name.required'                  => trans('CompanyNameRequired '),
               'logo.required'                   => trans('Company Logo required image Jgeg,Jgp,Png,Gif Only'),
               'website_name.required'           => trans('Company Website Name Required'),
               'email.required'                 => trans('Company Email Required'),
               'email.email'                    => trans('emailInvalid'),



               ];
    }


}
