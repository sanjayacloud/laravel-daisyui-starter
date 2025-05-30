# !!!!!!! This package is still in testing mode. It's not yet ready to use. !!!!!!!!!!!!

# Laravel DaisyUI Starter Kit

A beautiful Laravel starter kit with DaisyUI integration, providing a modern and responsive UI framework for your Laravel applications. Built with Tailwind CSS v4 and the latest DaisyUI.

## Features

- 🎨 DaisyUI components integration
- 🌓 Dark mode support
- 📱 Responsive design
- 🎯 CSS-first theme configuration
- 🚀 Easy to customize
- 📦 Simple installation
- 🔐 Authentication with Laravel Breeze
- ⚡ Tailwind CSS v4 integration

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
- Publish the package assets
- Install required NPM packages (Tailwind CSS v4 and DaisyUI)
- Configure Vite with Tailwind CSS
- Set up the CSS configuration
- Build the assets

4. Start your development server:
```bash
php artisan serve
```

5. In a separate terminal, start the Vite development server:
```bash
npm run dev
```

## Theme Configuration

Themes are now configured directly in your CSS using CSS variables, following Tailwind CSS v4's CSS-first approach. The configuration is located in `resources/css/app.css`:

```css
@layer theme {
    :root {
        --theme: "light";
        --color-primary: oklch(0.6569 0.196 275.75);
        --color-secondary: oklch(0.7176 0.158 342.55);
        --color-accent: oklch(0.7059 0.169 183.61);
        /* ... other color variables ... */
    }

    [data-theme="dark"] {
        --theme: "dark";
        --color-base-100: oklch(0.2 0 0);
    }
}
```

### Customizing Colors

To customize your theme colors, modify the CSS variables in `resources/css/app.css`. Available color variables:

- `--color-primary`: Main brand color
- `--color-secondary`: Secondary brand color
- `--color-accent`: Accent color
- `--color-neutral`: Neutral color
- `--color-base-100`: Background color
- `--color-info`: Information color
- `--color-success`: Success color
- `--color-warning`: Warning color
- `--color-error`: Error color

### Switching Themes

To switch themes in your Blade templates:

```html
<html data-theme="light">
    <!-- For light theme -->
</html>

<!-- OR -->

<html data-theme="dark">
    <!-- For dark theme -->
</html>
```

For dynamic theme switching:

```php
<html data-theme="{{ $theme }}">
    <!-- Your content -->
</html>
```

## Usage

After installation, you can use DaisyUI components in your views:

```html
<button class="btn btn-primary">Primary Button</button>
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>Card content</p>
    </div>
</div>
```

### Authentication

The package integrates with Laravel Breeze for authentication. All auth views are styled with DaisyUI components. Available routes:

- Login: `/login`
- Register: `/register`
- Password Reset: `/forgot-password`
- Profile: `/profile`

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

3. If themes are not applying:
- Ensure the `data-theme` attribute is properly set on your HTML elements
- Check that your CSS variables are correctly defined in `resources/css/app.css`
- Make sure Vite is properly building your assets

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email sanjayaprasanna20@gmail.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.