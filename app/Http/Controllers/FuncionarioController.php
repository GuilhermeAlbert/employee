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
        $funcionario->name = $request->name;
        $funcionario->email = $request->email;
        
        // Saving the data
        $funcionario->save();

        // Returning the data
        return new StoreResource($funcionario);
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

        // Setting the content
        $funcionario->name = $request->name;
        $funcionario->email = $request->email;
        
        // Saving the changes
        $funcionario->save();

        // Returning the data
        return new UpdateResource($funcionario);
    }

    /**
     * @api {delete} /api/funcionarios/{id}
     * Delete the funcionario 
     *
     * @return Json
     */
    public function destroy(DestroyFuncionario $request)
    {
        // Getting the funcionario
        $funcionario = $request->funcionario;

        // Deleting the funcionario
        try {
            $funcionario->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }

        // Returning the data
        return new DestroyResource();
    }
}