<?php

namespace App\Http\Resources\Funcionario;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Utils\RedisCache;
use Cache;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Get the expiration
        $expiration = RedisCache::EXPIRATION;

        // Get the key to save on database
        $key = RedisCache::EMPLOYEE_KEY;

        // Return the redis cached data
        $cached = Cache::store('redis')->put($request, $key, $expiration);

        // Return the cached data
        return parent::toArray($cached);
    }
}
