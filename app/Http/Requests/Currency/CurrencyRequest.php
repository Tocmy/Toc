<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    protected $errorBag = 'currencyErrorBag';
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
        return [
            
        ];
    }
}
