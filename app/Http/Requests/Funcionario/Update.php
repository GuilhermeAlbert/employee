<?php

namespace App\Http\Requests\Funcionario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Utils\HttpStatusCodes;
use App\Rules\CheckEmail;
use App\Rules\CheckNome;
use App\Rules\CheckImagem;
use App\Funcionario;
use App\Endereco;
use Image;

class Update extends FormRequest
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
        $rules = [
            'funcionario_id' => ['numeric', 'required'],
            'funcionario'    => 'required',
            'nome'           => 'required',
            'phone'          => 'string',
            'cargo'          => 'string',
            'salario'        => 'string',
            'genero'         => ['string', 'in:masculino,feminino'],
            'cep'            => 'string',
            'logradouro'     => 'string',
            'bairro'         => 'string',
            'numero'         => 'string',
            'cidade'         => 'string',
            'estado'         => 'string',
            'pais'           => 'string',
        ];

        if($this->hasFile('imagem')) {
            $rules = [
                'imagem'         => ['mimes:jpeg,jpg,png,gif', 'max:10000', new CheckImagem($this->imagem)]
            ];
        }
        
        return $rules;
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

        if($this->funcionario) {

            // Getting the address
            $this->endereco = Endereco::find($this->funcionario_id);
            
            
            // dd($this->funcionario->email);
            
            // Employee validation rules
            ($this->nome)    ? $this->nome    = $this->nome    : $this->nome    = ($this->funcionario->nome)    ? $this->funcionario->nome    : "";
            ($this->email)   ? $this->email   = $this->email   : $this->email   = ($this->funcionario->email)   ? $this->funcionario->email   : "";
            ($this->imagem)  ? $this->imagem  = $this->imagem  : $this->imagem  = ($this->funcionario->imagem)  ? $this->funcionario->imagem  : "";
            ($this->phone)   ? $this->phone   = $this->phone   : $this->phone   = ($this->funcionario->phone)   ? $this->funcionario->phone   : "";
            ($this->cargo)   ? $this->cargo   = $this->cargo   : $this->cargo   = ($this->funcionario->cargo)   ? $this->funcionario->cargo   : "";
            ($this->salario) ? $this->salario = $this->salario : $this->salario = ($this->funcionario->salario) ? $this->funcionario->salario : "";
            ($this->genero)  ? $this->genero  = $this->genero  : $this->genero  = ($this->funcionario->genero)  ? $this->funcionario->genero  : "";
    
            // Address validation rules
            ($this->cep)        ? $this->cep        = $this->cep        : $this->cep        = ($this->funcionario->cep)        ? $this->funcionario->cep        : "";
            ($this->logradouro) ? $this->logradouro = $this->logradouro : $this->logradouro = ($this->funcionario->logradouro) ? $this->funcionario->logradouro : "";
            ($this->bairro)     ? $this->bairro     = $this->bairro     : $this->bairro     = ($this->funcionario->bairro)     ? $this->funcionario->bairro     : "";
            ($this->numero)     ? $this->numero     = $this->numero     : $this->numero     = ($this->funcionario->numero)     ? $this->funcionario->numero     : "";
            ($this->cidade)     ? $this->cidade     = $this->cidade     : $this->cidade     = ($this->funcionario->cidade)     ? $this->funcionario->cidade     : "";
            ($this->estado)     ? $this->estado     = $this->estado     : $this->estado     = ($this->funcionario->estado)     ? $this->funcionario->estado     : "";
            ($this->pais)       ? $this->pais       = $this->pais       : $this->pais       = ($this->funcionario->pais)       ? $this->funcionario->pais       : "";
    
            $this->image_path = "";
    
            // Image manipulation
            if($this->hasFile('imagem')) 
            {
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
    
            } else $this->image_path = $this->imagem;
    
            // Prepare the data to validate
            $this->merge([
                'funcionario_id' => $this->funcionario_id,
                'funcionario'    => $this->funcionario,
                'nome'           => $this->nome,
                'email'          => $this->email,
                'imagem'         => $this->imagem,
                'image_path'     => $this->image_path,
                'phone'          => $this->phone,
                'cargo'          => $this->cargo,
                'salario'        => $this->salario,
                'genero'         => $this->genero,
                'cep'            => $this->cep,
                'logradouro'     => $this->logradouro,
                'bairro'         => $this->bairro,
                'numero'         => $this->numero,
                'cidade'         => $this->cidade,
                'estado'         => $this->estado,
                'pais'           => $this->pais,
            ]);
        } else {
            // Prepare the data to validate
            $this->merge([
                'funcionario_id' => $this->funcionario_id,
                'funcionario'    => $this->funcionario
            ]);    
        }
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