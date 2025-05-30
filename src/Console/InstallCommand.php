<?php

namespace Sanjaya\LaravelDaisyuiStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Process;

class InstallCommand extends Command
{
    protected $signature = 'daisyui-starter:install';

    protected $description = 'Install the DaisyUI Starter Kit components and resources';

    public function handle()
    {
        $this->info('Installing DaisyUI Starter Kit...');

        // Install Breeze if not already installed
        if (!file_exists(base_path('routes/auth.php'))) {
            $this->info('Installing Laravel Breeze...');
            $this->callSilent('breeze:install', ['--dark' => true]);
        }

        // Publish assets
        $this->info('Publishing assets...');
        $this->callSilent('vendor:publish', [
            '--provider' => 'Sanjaya\LaravelDaisyuiStarter\LaravelDaisyuiStarterServiceProvider',
            '--force' => true,
        ]);

        // Install NPM packages
        $this->info('Installing NPM packages...');
        $this->updateNodePackages(function ($packages) {
            return [
                'daisyui' => '^4.0.0',
                ...$packages,
            ];
        });

        // Update Tailwind configuration
        $this->info('Configuring Tailwind...');
        $this->updateTailwindConfig();

        $this->info('Running npm install && npm run build...');
        $this->runCommands(['npm install', 'npm run build']);

        $this->info('DaisyUI Starter Kit installed successfully.');
        $this->info('Please run "npm run dev" to compile your fresh scaffolding.');
    }

    protected function updateNodePackages(callable $callback)
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);
        $packages['dependencies'] = $callback($packages['dependencies'] ?? []);
        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    protected function updateTailwindConfig()
    {
        if (!file_exists(base_path('tailwind.config.js'))) {
            copy(__DIR__.'/../../tailwind.config.js', base_path('tailwind.config.js'));
            return;
        }

        $tailwindConfig = file_get_contents(base_path('tailwind.config.js'));
        
        // Add daisyui to plugins if not already present
        if (!str_contains($tailwindConfig, 'daisyui')) {
            $tailwindConfig = preg_replace(
                '/plugins:\s*\[(.*?)\]/s',
                'plugins: [$1, require("daisyui")]',
                $tailwindConfig
            );
        }

        // Add daisyui config if not present
        if (!str_contains($tailwindConfig, 'daisyui:')) {
            $tailwindConfig = preg_replace(
                '/module\.exports\s*=\s*({[\s\S]*?})/s',
                'module.exports = {$1,\n  daisyui: {\n    themes: ["light", "dark", "cupcake", "corporate", "synthwave", "retro", "cyberpunk"]\n  }\n}',
                $tailwindConfig
            );
        }

        file_put_contents(base_path('tailwind.config.js'), $tailwindConfig);
    }

    protected function runCommands($commands)
    {
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