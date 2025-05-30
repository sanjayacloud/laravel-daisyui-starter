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

## Installation

You can install the package via composer:

```bash
composer require sanjaya/laravel-daisyui-starter
```

After installing the package, publish the assets:

```bash
php artisan vendor:publish --provider="Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider"
```

Install the required NPM packages:

```bash
npm install daisyui@latest
```

## Configuration

The package configuration file will be published at `config/laravel-daisyui-starter.php`. You can modify the following options:

- Theme selection
- Navigation settings
- Layout preferences

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

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email your-email@example.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.