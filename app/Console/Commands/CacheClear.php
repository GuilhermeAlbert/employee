<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class CacheClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleans the cache of config, routes, views and autoload.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('config:clear');
        $this->info('Configuration cache cleared!');
        $this->info('====================================');

        Artisan::call('config:cache');
        $this->info('Configuration cache cleared!');
        $this->info('====================================');
        
        Artisan::call('cache:clear');
        $this->info('Configuration cache cleared!');
        $this->info('====================================');

        Artisan::call('view:clear');
        $this->info('Configuration view cleared!');
        $this->info('====================================');

        Artisan::call('route:clear');
        $this->info('Configuration route cleared!');
        $this->info('====================================');

        system('composer dump-autoload');
        $this->info('Composer autoload was executed!');
        $this->info('====================================');

        $this->info('All done.');
        $this->info('====================================');
    }
}
