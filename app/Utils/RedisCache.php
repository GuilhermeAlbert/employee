<?php

namespace App\Utils;

/*
 * Redis cache settings 
 *
 * Use method: Cache::EXPIRATION;
 */
class RedisCache
{
    /*
     * Expiration time
     */
    const EXPIRATION = 60 * 24; // Minutes * Hours 

    /*
     * Redis cache Keys
     */
    const EMPLOYEE_KEY = 'employee_';
}