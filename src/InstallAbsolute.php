<?php

namespace CDN;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class InstallAbsolute extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cdn:absolute';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Absolute path';
    /**
     * The views that need to be exported.
     *
     * @var array
     */
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        
        //$this->info('Searching project in remote CDN.');
        //$runTask = exec('envoy run cdn');
        $this->laravel->make('files')->link(
            storage_path('app/public'), 'http://example.com'
        );

    }
    /**
     * Export the authentication views.
     *
     * @return void
     */
}