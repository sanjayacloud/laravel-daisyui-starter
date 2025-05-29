<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Theme
    |--------------------------------------------------------------------------
    |
    | This option controls the default theme for your application.
    | Available themes: light, dark, cupid, corporate, synthwave, retro, cyberpunk
    |
    */
    'theme' => env('DAISYUI_THEME', 'light'),

    /*
    |--------------------------------------------------------------------------
    | Navigation Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the navigation settings for your application.
    |
    */
    'navigation' => [
        'show_user_menu' => true,
        'show_dark_mode_toggle' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Layout Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the layout settings for your application.
    |
    */
    'layout' => [
        'footer_text' => '© ' . date('Y') . ' Your Company. All rights reserved.',
        'show_footer' => true,
    ],
];