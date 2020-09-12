<?php

return [

    /*
    |--------------------------------------------------------------------------
    | TMI Cluster Redis Connection
    |--------------------------------------------------------------------------
    |
    | This is the name of the Redis connection where TMI Cluster will store the
    | meta information required for it to function. It includes the list
    | of supervisors, metrics, and other information.
    |
    */

    'use' => 'default',

    /*
    |--------------------------------------------------------------------------
    | TMI Cluster Redis Prefix
    |--------------------------------------------------------------------------
    |
    | This prefix will be used when storing all TMI Cluster data in Redis. You
    | may modify the prefix when you are running multiple installations
    | of TMI Cluster on the same server so that they don't have problems.
    |
    */

    'prefix' => env('TMI_CLUSTER_PREFIX', 'tmi-cluster:'),

    /*
    |--------------------------------------------------------------------------
    | TMI Client Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may specify the TMI configuration for your TMI Cluster, which
    | will be used by the TMI Cluster. We have gone ahead and set this
    | to a sensible default for you out of the box.
    |
    */

    'tmi' => [
        'options' => ['debug' => false],
        'connection' => [
            'secure' => true,
            'reconnect' => true,
            'rejoin' => true,
        ],
        'identity' => [
            'username' => env('TMI_IDENTITY_USERNAME'),
            'password' => env('TMI_IDENTITY_PASSWORD'),
        ],
        'channels' => ['ghostzero', 'twitchcologne']
    ],
];