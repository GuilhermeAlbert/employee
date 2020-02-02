<?php

use Illuminate\Database\Seeder;
use App\Utils\Numbers;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Funcionario', Numbers::TWENTY)->create();
    }
}
