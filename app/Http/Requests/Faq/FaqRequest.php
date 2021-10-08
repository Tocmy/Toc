<?php
namespace App\Http\Requests\Faq;



use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
                     'question'  => 'required',
                     'answer'    => 'required',
                ];
                break;
            //update
            case 'PUT':
                $this->rules = [
                    'question'  => 'required',
                    'answer'    => 'required',
                ];
                break;
            //update
            case 'PATCH':
                $this->rules = [
                    'question'  => 'required',
                    'answer'    => 'required',
                ];
                break;

            default:
                // invalid request
                break;
        }

        return $this->rules;
    }
}