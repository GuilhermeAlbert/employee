<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

}
