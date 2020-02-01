<?php

namespace App\Http\Resources\Funcionario;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'funcionario' => $this['funcionario'],
            'endereco'    => $this['endereco'],
        ];
    }
}
