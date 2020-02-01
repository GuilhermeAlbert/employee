<?php

namespace App\Http\Requests\Funcionario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\HttpStatusCodes;

use Hash, Image;

class Store extends FormRequest
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
            'nome'    => 'required',
            'imagem'  => ['mimes:jpeg,jpg,png,gif', 'max:10000'],
            'email'   => ['required', 'email', 'unique:funcionarios'],
            'phone'   => 'string',
            'cargo'   => 'string',
            'salario' => 'string',
            'genero'  => ['string', 'in:masculino,feminino'],
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
        $this->image_path = "";

        if($this->hasFile('imagem')) {

            // File settings
            $this->file = $this->file('imagem');
            $this->filename = sha1(time());
            $this->file_extension = $this->file->getClientOriginalExtension();
            
            // Getting the host url
            $this->host_url = $this->getSchemeAndHttpHost();
            $this->uploads_path = public_path() . "/uploads/". $this->filename . "." . $this->file_extension;

            // Manipulate the image
            Image::make($this->file->getRealPath())->resize(150, 150)->save($this->uploads_path);

            // Getting the saved image path
            $this->image_path = urldecode($this->host_url . '/img/cache/thumb/' . $this->filename . "." .$this->file_extension);
        }

        $this->merge([
            'image_path' => $this->image_path,
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
