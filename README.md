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
- 🔐 Authentication with Laravel Breeze

## Requirements

- PHP ^8.2
- Laravel ^12.0
- Node.js & NPM

## Installation

1. Create a new Laravel project:
```bash
laravel new my-project
cd my-project
```

2. Install the package via composer:
```bash
composer require sanjaya/laravel-daisyui-starter:dev-main
```

3. Run the installation command:
```bash
php artisan daisyui-starter:install
```

This will:
- Install Laravel Breeze (if not already installed)
- Publish the package assets and configuration
- Install required NPM packages
- Configure Tailwind CSS with DaisyUI
- Build the assets

4. Start your development server:
```bash
php artisan serve
```

5. In a separate terminal, start the Vite development server:
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

### Authentication

The package integrates with Laravel Breeze for authentication. All auth views are styled with DaisyUI components. Available routes:

- Login: `/login`
- Register: `/register`
- Password Reset: `/forgot-password`
- Profile: `/profile`

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