<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Would you like the install button to appear on all pages?
      Set true/false
    |--------------------------------------------------------------------------
    */

    'install-button' => true,

    /*
    |--------------------------------------------------------------------------
    | PWA Manifest Configuration
    |--------------------------------------------------------------------------
    |  php artisan erag:update-manifest
    */

    'manifest' => [
        'id' => 'sigma',
        'name' => 'SIGMA',
        'short_name' => 'SIGMA',
        'background_color' => '#ffffff',
        'display' => 'fullscreen',
        'orientation' => 'portrait',
        'description' => 'Sistema de Inscripción, Gestión de Materias y Asistencia',
        'theme_color' => '#ffffff',
        'icons' => [
            [
                'src' => 'logo.svg',
                'sizes' => 'any',
                'type' => 'image/svg+xml',
                'purpose' => 'any'
            ],
            [
                'src' => 'logo(192x192).png',
                'sizes' => '192x192',
                'type' => 'image/png',
                'purpose' => 'any'
            ],
            [
                'src' => 'logo(512x512).png',
                'sizes' => '512x512',
                'type' => 'image/png',
                'purpose' => 'any'
            ],
        ],
        'screenshots' => [
            [
                'src' => 'screenshot.png',
                'sizes' => '1280x720',
                'type' => 'image/png',
                'platform' => 'wide',
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug Configuration
    |--------------------------------------------------------------------------
    | Toggles the application's debug mode based on the environment variable
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Livewire Integration
    |--------------------------------------------------------------------------
    | Set to true if you're using Livewire in your application to enable
    | Livewire-specific PWA optimizations or features.
    */

    'livewire-app' => false,
];
