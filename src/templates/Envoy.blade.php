
@include('vendor/autoload.php')

@setup
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();    
    $CDN_SETUP = getenv('CDN_BASE').'/../Setup.sh '.env('CDN_BASE').'/'.env('CDN_BASE_SUBDIRECTORY');
@endsetup

@servers(['setup' => ['root@new-dev.ktcagency.com']])

@task('cdn', ['on' => 'setup'])
    TASK=bash {{ $CDN_SETUP }}
    @php
    file_put_contents(base_path()."/.env", "test", FILE_APPEND | LOCK_EX);
    @endphp
@endtask