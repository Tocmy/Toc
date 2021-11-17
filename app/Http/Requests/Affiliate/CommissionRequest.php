<?php

namespace App\Http\Requests\Affiliate;

use Illuminate\Foundation\Http\FormRequest;

class CommissionRequest extends FormRequest
{
    protected $errorBag = 'commissionErrorBag';
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
            //index, create,edit, show
            case 'GET':
                $this->rules = [

                ];
                break;
            //store
            case 'POST':
                $this->rules = [
                    'amount'  => 'required',
                    'type'    => 'required',
                    'name'    => 'required'

                ];
                break;
            //update
            case 'PUT':
                $this->rules = [
                    'amount'  => 'required',
                    'type'    => 'required',
                ];
                break;
            //update
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

               'amount.required'                  => __('Amount is required '),
               'type.required'                    => __('Commission type is required'),
               'name.required'                    => __('Commission Cannot be empty')


               ];
    }
}
