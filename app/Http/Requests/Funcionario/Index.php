<?php

namespace App\Http\Requests\Funcionario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\HttpStatusCodes;
use App\Utils\Numbers;

class Index extends FormRequest
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
            'items_per_page'  => 'numeric',
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
        // Verify if has the paginate filter
        if(!$this->items_per_page) 
            $this->items_per_page = Numbers::TWENTY;

        // Prepare the data to validate
        $this->merge([
            'items_per_page' => $this->items_per_page
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