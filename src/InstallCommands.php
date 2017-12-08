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
        chmod(base_path()."/.env", 0777);

        $directory = $this->ask('Name of the new CDN, no special characters or spaces (example: new_client');
        $sshUser = $this->ask('Write your SSH user (example: root@new-dev.ktcagency.com');
        $pathSSH = $this->ask('Type the path to your puprivada ssh key (example: /Users/John/.ssh/id_rsa)');

         
        $getUser = str_replace('ssh ','',$sshUser);
        $getUser = explode("@",$sshUser);
        $user = $getUser[0];
        $host = $getUser[1];

        $templateFile = file_get_contents(__dir__."/templates/envSample.txt");
        $templateFile = str_replace('CDN_BASE_SUBDIRECTORY=', 'CDN_BASE_SUBDIRECTORY="'.ltrim($directory).'"', $templateFile);
        $templateFile = str_replace('CDN_SSH_USERNAME=', 'CDN_SSH_USERNAME="'.ltrim($user).'"', $templateFile);
        $templateFile = str_replace('CDN_SSH_HOST=', 'CDN_SSH_HOST="'.ltrim($host).'"', $templateFile);
        $templateFile = str_replace('CDN_SSH_PRIVATE_KEY_PATH=', 'CDN_SSH_PRIVATE_KEY_PATH="'.ltrim($pathSSH).'"', $templateFile);
        file_put_contents(base_path()."/.env", $templateFile, FILE_APPEND);
        
        sleep(2);

        $this->info('Creating the remote directory...');
        $runTask = exec('envoy run cdn');
        $this->info('The new configuration was created in your .env file');
        $this->info('The repository is done in: '.env('CDN_PUBLIC').'/'.env('CDN_BASE_SUBDIRECTORY'));
        $this->info($runTask);
    

    }
    /**
     * Export the authentication views.
     *
     * @return void
     */
}