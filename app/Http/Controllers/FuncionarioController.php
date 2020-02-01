<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// Requests
use App\Http\Requests\Funcionario\Index;
use App\Http\Requests\Funcionario\Show;
use App\Http\Requests\Funcionario\Update;
use App\Http\Requests\Funcionario\Destroy;
use App\Http\Requests\Funcionario\Store;

// Resources
use App\Http\Resources\Funcionario\IndexResource;
use App\Http\Resources\Funcionario\ShowResource;
use App\Http\Resources\Funcionario\UpdateResource;
use App\Http\Resources\Funcionario\DestroyResource;
use App\Http\Resources\Funcionario\StoreResource;

// Models
use App\Funcionario;
use App\Endereco;

class FuncionarioController extends Controller
{
    /**
     * @api {get} /api/funcionarios/
     * Getting all funcionarios 
     *
     * @return Json
     */
    public function index(Index $request)
    {
    	// Getting all funcionarios
        $funcionarios = Funcionario::paginate($request->items_per_page);

        // Returning Json
        return new IndexResource($funcionarios);
    }

    /**
     * @api {get} /api/funcionarios/{id}
     * Getting the specific funcionario 
     *
     * @return Json
     */
    public function show(Show $request)
    {
        // Getting the data
        $funcionario = $request->funcionario;

        // Returning the data
        return new ShowResource($funcionario);
    }

    /**
     * @api {post} /api/funcionarios/{id}
     * Agregate value to table funcionarios 
     *
     * @return Json
     */
    public function store(Store $request)
    {
        // Getting the funcionario
        $funcionario = new Funcionario;
        
        // Setting the data
        $funcionario->nome    = $request->nome;
        $funcionario->imagem  = $request->image_path;
        $funcionario->email   = $request->email;
        $funcionario->phone   = $request->phone;
        $funcionario->cargo   = $request->cargo;
        $funcionario->salario = $request->salario;
        $funcionario->genero  = $request->genero;
        
        // Saving the data
        $funcionario->save();

        // Gettin the address 
        $endereco = new Endereco;
        
        // Setting the address data
        $endereco->cep            = $request->cep;
        $endereco->logradouro     = $request->logradouro;
        $endereco->bairro         = $request->bairro;
        $endereco->numero         = $request->numero;
        $endereco->cidade         = $request->cidade;
        $endereco->estado         = $request->estado;
        $endereco->pais           = $request->pais;
        $endereco->funcionario_id = $funcionario->id;

        // Saving the data
        $endereco->save();        

        // Returning the data
        return new StoreResource([
            'funcionario' => $funcionario,
            'endereco'    => $endereco
        ]);
    }

    /**
     * @api {put} /api/funcionarios/{id}
     * Update the funcionario 
     *
     * @return Json
     */
    public function update(Update $request)
    {
        // Getting the funcionario
        $funcionario = $request->funcionario;
        
        // Setting the data
        $funcionario->nome    = $request->nome;
        $funcionario->imagem  = $request->image_path;
        $funcionario->email   = $request->email;
        $funcionario->phone   = $request->phone;
        $funcionario->cargo   = $request->cargo;
        $funcionario->salario = $request->salario;
        $funcionario->genero  = $request->genero;
        
        // Saving the data
        $funcionario->save();

        // Gettin the address 
        $endereco = $request->endereco;
        
        // Setting the address data
        $endereco->cep            = $request->cep;
        $endereco->logradouro     = $request->logradouro;
        $endereco->bairro         = $request->bairro;
        $endereco->numero         = $request->numero;
        $endereco->cidade         = $request->cidade;
        $endereco->estado         = $request->estado;
        $endereco->pais           = $request->pais;
        $endereco->funcionario_id = $funcionario->id;

        // Saving the data
        $endereco->save();        

        // Returning the data
        return new StoreResource([
            'funcionario' => $funcionario,
            'endereco'    => $endereco
        ]);
    }

    /**
     * @api {delete} /api/funcionarios/{id}
     * Delete the funcionario 
     *
     * @return Json
     */
    public function destroy(Destroy $request)
    {
        // Getting the funcionario
        $funcionario = $request->funcionario;
        
        // Getting the address
        $endereco = $request->endereco;

        // Deleting the funcionario
        try {
            $funcionario->delete();
            if ($endereco) {
                $endereco->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        // Returning the data
        return new DestroyResource($funcionario);
    }
}