<?php

namespace App\Utils;

/*
 * API urls utils
 *
 * Use method: ApiUrls::INDEX_FUNCIONARIOS;
 */
class ApiUrls
{
    // To use in unit tests
    const INDEX_FUNCIONARIOS   = "/api/funcionarios";
    const SHOW_FUNCIONARIOS    = "/api/funcionarios/1";
    const STORE_FUNCIONARIOS   = "/api/funcionarios";
    const UPDATE_FUNCIONARIOS  = "/api/funcionarios/1";
    const DESTROY_FUNCIONARIOS = "/api/funcionarios/1";
}