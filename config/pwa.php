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
        'name' => 'SIGMA',
        'short_name' => 'SIGMA',
        'background_color' => '#ffffff',
        'display' => 'fullscreen',
        'description' => 'Sistema de Inscripción, Gestión de Materias y Asistencia',
        'theme_color' => '#ffffff',
        'icons' => [
            [
                'src' => 'logo.svg',
                'sizes' => 'any',
                'type' => 'image/svg+xml',
                'purpose' => 'any'
            ],
        ],
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
