<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Credentials
    |--------------------------------------------------------------------------
    |
    | If you're using API credentials, change these settings. Get your
    | credentials from https://blast.my/.
    |
    */

    'api_token'    => function_exists('env') ? env('BLAST_API_TOKEN', '') : '',

    'web_hook'    => function_exists('env') ? env('BLAST_WEBHOOK', '') : '',

];
