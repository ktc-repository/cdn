<?php

namespace CDN;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class InspectCommands extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cdn:inspect';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inspect the remote CDN.';
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
        
        $this->info('Searching project in remote CDN.');
        //$runTask = exec('envoy run cdn');

    }
    /**
     * Export the authentication views.
     *
     * @return void
     */
}