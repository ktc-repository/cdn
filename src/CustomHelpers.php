<?php
function CDN($file)
{
    return env('CDN_PUBLIC').'/'.env('CDN_BASE_SUBDIRECTORY').'/'.$file;
}

function CDN_EXT($file)
{
    $getExt = explode('.',$file);
    return strtolower(end($getExt));
}
?>