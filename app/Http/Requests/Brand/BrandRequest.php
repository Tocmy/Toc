<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    protected $errorBag = 'brandErrorBag';
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
                $this->rules = [

                ];
                break;

            case 'POST':
                $this->rules = [
                    'name'     => 'required|string|max:191',
                    'position' => 'required|numeric|integer',
                    'image'    =>  'required|image|mimes:jpeg,png,jpg,gif,svg',
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
        return [
            'name.unique' => __('This brand is already used'),
            'image.required' => __('Image is required'),
            'image.image' => __('Image file only required'),
        ];
    }
}
