<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
	/**
     * Instancing table of database
     *
     * @var string
     */     
    protected $table = 'funcionarios';

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
        'nome',
        'documento',
        'email',
        'phone',
        'cargo',
        'salario',
        'genero',
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
