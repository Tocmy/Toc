<?php

namespace App\Http\Requests\General;

use Illuminate\Foundation\Http\FormRequest;

class TypeRequest extends FormRequest
{
    protected $errorBag = 'typeErrorBag';
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
        $method = $this->method();
        if (null !== $this->get('_method', null)) {
            $method = $this->get('_method');
        }
        $this->offsetUnset('_method');
        switch ($method) {
            case 'DELETE':
                $this->rules = [];
                break;
            case 'GET':
                $this->rules = [];
                break;

            case 'POST':
                $this->rules = [];
                break;
            case 'PUT':
                $this->rules = [];
                break;

            case 'PATCH':
                $this->rules = [];
                break;

            default:
                // invalid request
                break;
        }

        return $this->rules;
    }

    public function messages()
    {
        return[

               'name.required'                  => __('CompanyNameRequired '),
               'logo.required'                   => __('Company Logo required image Jgeg,Jgp,Png,Gif Only'),
               'website_name.required'           => __('Company Website Name Required'),
               'email.required'                 => __('Company Email Required'),
               'email.email'                    => __('emailInvalid'),



               ];
    }
}
