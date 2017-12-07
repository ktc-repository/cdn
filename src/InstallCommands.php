<?php

namespace CDN;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class InstallCommands extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cdn:install';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install a new directory for this project in KTC Server.';
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
        //$this->exportViews();
        copy(__dir__."/templates/Envoy.blade.php", base_path()."/Envoy.blade.php");
        chmod(base_path()."/Envoy.blade.php", 0777);
        $this->info('Creating the remote directory...');
       exec('envoy run cdn');
        $this->info('The repository is done in: '.getenv('CDN_PUBLIC').'/'.env('CDN_BASE_SUBDIRECTORY'));
    

    }
    /**
     * Export the authentication views.
     *
     * @return void
     */
}