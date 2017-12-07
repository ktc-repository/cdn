<?php
function CDN($file)
{
    return env('CDN_PUBLIC').'/'.env('CDN_BASE_SUBDIRECTORY').'/'.$file;
}
?>