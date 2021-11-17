<?php

namespace App\Http\Requests\Tool;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;

class BackupRequest extends FormRequest
{
    protected $errorBag = 'backupErrorBag';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
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
                'file_name'    => 'nullable|max:30|regex:/^[\w._-]+$/',
                'backup_file'  => 'required|sql_gz',

                ];
                break;
            //update
            case 'PUT':
                $this->rules = [

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
}
