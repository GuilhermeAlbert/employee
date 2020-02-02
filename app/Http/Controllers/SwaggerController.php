<?php

/**
 * @license Apache 2.0
 *
 * @OA\Info(
 *     description="This is the Employee's API. Use the button 'try it out' to do the calls.",
 *     version="1.0.0",
 *     title="Employee API",
 *     termsOfService="https://treblalabs.com/",
 *     @OA\Contact(
 *         email="mail@treblalabs.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 *
 * @OA\PathItem(
 *     path="https://treblalabs.com"
 * )
 * 
 * @OA\Tag(
 *     name="Funcionarios",
 *     description="This is the API to manage the employees application.",
 * )
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController extends Controller
{
    /**
     * @OA\Get(path="/api/funcionarios",
     *      tags={"Funcionarios"},
     *      operationId="index",
     *      description="Get all users from API",
     *      @OA\Parameter(name="items_per_page",
     *          description="Itens per page to be used in pagination.",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Success response"
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Form request validation error. Invalid input."
     *      ),
     * )
     */


    /**
     * @OA\Get(path="/api/funcionarios/{funcionario}",
     *      tags={"Funcionarios"},
     *      operationId="show",
     *      description="Get a specifc user from API",
     *      @OA\Parameter(name="funcionario",
     *          description="The funcionario's ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(type="number")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Success response"
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Form request validation error. Invalid input."
     *      ),
     * )
     */


    /**
     * @OA\Post(path="/api/funcionarios",
     *      tags={"Funcionarios"},
     *      operationId="store",
     *      description="Store a new user into database",
     *      @OA\Parameter(name="nome",
     *          description="nome",
     *          in="query",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="imagem",
     *          description="imagem",
     *          in="query",
     *          required=true,
     *          @OA\Schema(type="file")
     *      ),
     *      @OA\Parameter(name="email",
     *          description="email",
     *          in="query",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="phone",
     *          description="phone",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="cargo",
     *          description="cargo",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="salario",
     *          description="salario",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="genero",
     *          description="genero",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="cep",
     *          description="cep",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="logradouro",
     *          description="logradouro",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="bairro",
     *          description="bairro",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="numero",
     *          description="numero",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="cidade",
     *          description="cidade",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="estado",
     *          description="estado",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="pais",
     *          description="pais",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Success response"
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Form request validation error. Invalid input."
     *      ),
     * )
     */


    /**
     * @OA\Put(path="/api/funcionarios/{funcionario}",
     *      tags={"Funcionarios"},
     *      operationId="update",
     *      description="Store a new user into database",
     *      @OA\Parameter(name="funcionario",
     *          description="The funcionario's ID",
     *          in="path",
     *          required=true,
     *          @OA\Schema(type="number")
     *      ),
     *      @OA\Parameter(name="nome",
     *          description="nome",
     *          in="query",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="imagem",
     *          description="imagem",
     *          in="query",
     *          required=true,
     *          @OA\Schema(type="file")
     *      ),
     *      @OA\Parameter(name="email",
     *          description="email",
     *          in="query",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="phone",
     *          description="phone",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="cargo",
     *          description="cargo",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="salario",
     *          description="salario",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="genero",
     *          description="genero",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="cep",
     *          description="cep",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="logradouro",
     *          description="logradouro",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="bairro",
     *          description="bairro",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="numero",
     *          description="numero",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="cidade",
     *          description="cidade",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="estado",
     *          description="estado",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(name="pais",
     *          description="pais",
     *          in="query",
     *          required=false,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Success response"
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Form request validation error. Invalid input."
     *      ),
     * )
     */
    

    /**
     * @OA\Delete(path="/api/funcionarios/{funcionario}",
     *      tags={"Funcionarios"},
     *      operationId="destroy",
     *      description="Destroy a specifc user from API",
     *      @OA\Response(
     *          response="200",
     *          description="Success response"
     *      ),
     *      @OA\Response(
     *          response="400",
     *          description="Form request validation error. Invalid input."
     *      ),
     * )
     */
}
