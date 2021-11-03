<?php

namespace App\Http\Requests\General;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    protected $errorBag = 'emailErrorBag';
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
                $this->rules = [
                    'recipient' => 'required|email',
                    'subject' => 'required|max:250',
                    'message' => 'required|string'
                ];
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

               'recipient.required'              => __('Recipient email address required '),
               'subject.required'                => __('subject of email cannot blank'),
               



               ];
    }
}
