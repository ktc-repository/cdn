<?php

    namespace CDN;

    //use Illuminate\Support\Facades\Config;

    use Illuminate\Support\ServiceProvider;

    use League\Flysystem\Filesystem;
    //use League\Flysystem\Sftp\SftpAdapter;
    use CDN\SftpCustomAdapter;
    use CDN\InstallCommands;
    use CDN\InstallAbsolute;
    
    class CDNServiceProvider extends ServiceProvider{
        /**
         * Perform post-registration booting of services.
         *
         * @return void
         */
        public function boot()
        {

            
            
            $filesystem = $this->app->make('filesystem');
            $filesystem->extend('sftp', function($app, $config) {
                return new Filesystem(new SftpCustomAdapter($config));
            });

        }
        /**
         * Register bindings in the container.
         *
         * @return void
         */
        public function register()
        {
            //
            if ($this->app->runningInConsole()) {
                $this->registerConsoleCommands();
            }
       

        }
        
        private function registerConsoleCommands()
        {
            $this->commands(InstallCommands::class);
            $this->commands(InstallAbsolute::class);
        }
    }
    