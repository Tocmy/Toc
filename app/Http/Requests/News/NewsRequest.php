<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    protected $errorBag = 'newsErrorBag';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
             $this->rules = [ ];
         break;
     case 'GET':
             $this->rules = [ ];
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
}
