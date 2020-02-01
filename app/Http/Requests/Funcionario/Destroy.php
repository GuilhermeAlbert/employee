<?php

namespace App\Http\Requests\Funcionario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\HttpStatusCodes;
use App\Funcionario;

class Destroy extends FormRequest
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
            'funcionario_id' => 'required',
            'funcionario' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 
        ];
    }
    
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Getting the funcionario
        $this->funcionario_id = $this->route('funcionario');
        $this->funcionario = Funcionario::find($this->funcionario_id);

        // Setting the data
        $this->merge([
            'funcionario' => $this->funcionario,
            'funcionario_id' => $this->funcionario_id
        ]);
    }
    
    /**
     * Verify if has erros and print it
     *
     * @return Json
     */    
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
        response()->json(
            [
                'errors' => $validator->errors()->all(),
                'code' => HttpStatusCodes::BAD_REQUEST
            ]
        ));
    }      
}
