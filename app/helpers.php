<?php

if (! function_exists('mix')) {
    function mix($asset)
    {
        $manifest = json_decode(file_get_contents(public_path('mix-manifest.json')));

        return $manifest->$asset;
    }
}
