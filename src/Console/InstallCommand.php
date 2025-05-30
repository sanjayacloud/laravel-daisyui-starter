<?php

namespace Sanjaya\LaravelDaisyuiStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Process;

class InstallCommand extends Command
{
    protected $signature = 'daisyui-starter:install {--php_version= : The PHP executable to use}';

    protected $description = 'Install the DaisyUI Starter Kit components and resources';

    protected $themes = [
        'modern' => 'Modern Theme - Clean and minimalist design',
        'corporate' => 'Corporate Theme - Professional business look',
        'retro' => 'Retro Theme - Classic nostalgic design',
        'cyberpunk' => 'Cyberpunk Theme - Futuristic neon style',
        'fantasy' => 'Fantasy Theme - Magical and whimsical design'
    ];

    public function handle()
    {
        $this->info('Welcome to Laravel DaisyUI Starter Kit Installation!');
        $this->info('This will install Laravel Breeze with DaisyUI integration.');

        // Select theme
        $theme = $this->choice(
            'Which theme would you like to install?',
            $this->themes,
            'modern'
        );

        $this->info('Installing Laravel Breeze...');
        $this->installBreeze();

        $this->info('Publishing starter kit resources...');
        $this->publishResources($theme);

        $this->info('Installing and building NPM dependencies...');
        $this->updateNodePackages();
        $this->buildAssets();

        $this->info('Starter kit installed successfully!');
        
        $this->line('');
        $this->info('Please execute the following commands to get started:');
        $this->comment('php artisan serve');
        $this->comment('npm run dev');
    }

    protected function installBreeze()
    {
        $command = $this->option('php_version') ?: 'php';
        
        if (!file_exists(base_path('routes/auth.php'))) {
            $this->callSilent('breeze:install', [
                '--dark' => true,
                '--php_version' => $command
            ]);
        }
    }

    protected function publishResources($theme)
    {
        // Publish views
        $this->callSilent('vendor:publish', [
            '--provider' => 'Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider',
            '--tag' => ['daisyui-starter-views'],
            '--force' => true,
        ]);

        // Publish theme assets
        $this->callSilent('vendor:publish', [
            '--provider' => 'Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider',
            '--tag' => ["daisyui-starter-{$theme}-theme"],
            '--force' => true,
        ]);

        // Update routes
        $this->callSilent('vendor:publish', [
            '--provider' => 'Sanjaya\LaravelDaisyuiStarterServiceProvider',
            '--tag' => 'daisyui-starter-routes',
            '--force' => true,
        ]);
    }

    protected function updateNodePackages()
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages['dependencies'] = array_merge([
            'tailwindcss' => '^4.0.0',
            '@tailwindcss/vite' => '^4.0.0',
            'daisyui' => '^4.0.0',
        ], $packages['dependencies'] ?? []);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );

        $this->updateViteConfig();
        $this->updateCssFile();
    }

    protected function updateViteConfig()
    {
        $viteConfig = <<<'JS'
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
JS;

        file_put_contents(base_path('vite.config.js'), $viteConfig);
    }

    protected function updateCssFile()
    {
        $cssContent = <<<'CSS'
@import "tailwindcss";

@layer theme {
    :root {
        --spacing: 0.25rem;
    }
}

/* DaisyUI theme configuration */
@layer theme {
    :root {
        --theme: "light";
        --color-primary: oklch(0.6569 0.196 275.75);
        --color-secondary: oklch(0.7176 0.158 342.55);
        --color-accent: oklch(0.7059 0.169 183.61);
        --color-neutral: oklch(0.7059 0.169 183.61);
        --color-base-100: oklch(1 0 0);
        --color-info: oklch(0.7059 0.169 183.61);
        --color-success: oklch(0.7176 0.158 142.55);
        --color-warning: oklch(0.8471 0.199 83.87);
        --color-error: oklch(0.7176 0.158 342.55);
    }

    [data-theme="dark"] {
        --theme: "dark";
        --color-base-100: oklch(0.2 0 0);
    }
}

/* Add your custom styles below */
CSS;

        file_put_contents(base_path('resources/css/app.css'), $cssContent);
    }

    protected function buildAssets()
    {
        $commands = ['npm install', 'npm run build'];
        
        $process = Process::pipe($commands);
        $process->run();

        if (!$process->successful()) {
            $this->error('Error running commands. Please run them manually:');
            foreach ($commands as $command) {
                $this->line('  - ' . $command);
            }
        }
    }
} 