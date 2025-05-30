# !!!!!!! This package is still in testing mode. It's not yet ready to use. !!!!!!!!!!!!

# Laravel DaisyUI Starter Kit

A beautiful Laravel starter kit with DaisyUI integration, providing a modern and responsive UI framework for your Laravel applications.

## Features

- 🎨 DaisyUI components integration
- 🌓 Dark mode support
- 📱 Responsive design
- 🎯 Multiple theme options
- 🚀 Easy to customize
- 📦 Simple installation

## Requirements

- PHP ^8.2
- Laravel ^12.0
- Node.js & NPM

## Installation

1. You can install the package via composer:

```bash
composer require sanjaya/laravel-daisyui-starter:dev-main
```

2. After installing the package, publish the assets. You can publish everything at once:

```bash
php artisan vendor:publish --provider="Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider"
```

Or you can publish items separately:

```bash
# Publish only the config file
php artisan vendor:publish --provider="Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider" --tag=config

# Publish only the views
php artisan vendor:publish --provider="Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider" --tag=views

# Publish only the assets (CSS)
php artisan vendor:publish --provider="Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider" --tag=assets
```

3. Install the required NPM packages:

```bash
npm install daisyui@latest
```

4. Compile your assets:

```bash
npm run dev
```

## Configuration

The package configuration file will be published at `config/laravel-daisyui-starter.php`. You can modify the following options:

- Theme selection
- Navigation settings
- Layout preferences

### Available Configuration Options

```php
return [
    // Default theme setting
    'theme' => env('DAISYUI_THEME', 'light'),

    // Navigation configuration
    'navigation' => [
        'show_user_menu' => true,
        'show_dark_mode_toggle' => true,
    ],

    // Layout configuration
    'layout' => [
        'footer_text' => '© ' . date('Y') . ' Your Company. All rights reserved.',
        'show_footer' => true,
    ],
];
```

## Usage

After installation, you can use the included Blade components in your views:

```php
<x-laravel-daisyui-starter::layout>
    <x-slot name="header">
        Your Header Content
    </x-slot>

    Your Main Content

    <x-slot name="footer">
        Your Footer Content
    </x-slot>
</x-laravel-daisyui-starter::layout>
```

## Available Themes

The package includes several DaisyUI themes:

- Light (default)
- Dark
- Cupid
- Corporate
- Synthwave
- Retro
- Cyberpunk

To change the theme, modify the `DAISYUI_THEME` value in your `.env` file or update the configuration file.

## Troubleshooting

### Common Issues

1. If you get a stability error when installing, use:
```bash
composer require sanjaya/laravel-daisyui-starter:dev-main
```

2. If assets are not showing up correctly:
- Make sure you've published all assets
- Clear your Laravel cache: `php artisan cache:clear`
- Rebuild your npm assets: `npm run build`

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email sanjayaprasanna20@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.