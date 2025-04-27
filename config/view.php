<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | These are the locations where Blade will look for your views. The first
    | item in the array is the path to the `resources/views` directory.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. A great default location is in the
    | `storage/framework/views` directory.
    |
    */

    'compiled' => realpath(storage_path('framework/views')) ?: storage_path('framework/views'),
];
