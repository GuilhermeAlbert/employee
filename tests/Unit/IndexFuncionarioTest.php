<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use App\Utils\ApiUrls;
use App\Utils\HttpStatusCodes;
use App\Utils\Numbers;
use App\Funcionario;

class IndexFuncionarioTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic unit test to call the API.
     *
     * @return void
     */
    public function testGetSuccess()
    {
        // Make the request on endpoint
        $response = $this->get(ApiUrls::INDEX_FUNCIONARIOS, ['items_per_page' => Numbers::TWENTY]);

        // Verify if exist a employee on database
        if(count(Funcionario::all()) > Numbers::ZERO)
            $expected = true;
        else
            $expected = false;

        // Make the http status assert
        $response->assertStatus(HttpStatusCodes::OK);

        // Make the true assert
        $this->assertTrue(true);

        // Make the boolean assert
        $this->assertTrue($expected);
    }
    
    /**
     * A basic unit test to call the API.
     *
     * @return void
     */
    public function testGetFail()
    {
        $this->assertTrue(false);
    }     
}
