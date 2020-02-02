<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Canducci\Cep\Facades\Cep;

class Endereco extends Model
{
    use SoftDeletes;
    
	/**
     * Instancing table of database
     *
     * @var string
     */     
    protected $table = 'enderecos';

    /**
     * The primary key of table
     *
     * @var string
     */     
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */     
    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'numero',
        'cidade',
        'estado',
        'pais',
    ];

    /**
     * Instancing dates of the table
     *
     * @var array
     */    
    protected $dates = [
        'created_at', 
        'updated_at', 
        'deleted_at'
    ]; 

    public static function findByZipcode($zipcode)
    {
        // Init array
        $cepArray = [];

        try {
            // Find with zipcode
            $cepFind = Cep::find($zipcode);
    
            // Pass to array
            $cepInfo = $cepFind->toArray();
    
            // Get the results
            $cepArray = $cepInfo->result();
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return $cepArray;
    }
}
