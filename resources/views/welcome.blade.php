<x-laravel-daisyui-starter::layout>
    <x-slot name="header">
        Welcome to DaisyUI Starter Kit
    </x-slot>

    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">Hello there</h1>
                <p class="py-6">This is a test page using your DaisyUI starter kit with beautiful components and a modern design.</p>
                <div class="flex gap-2 justify-center">
                    <button class="btn btn-primary">Get Started</button>
                    <button class="btn btn-ghost">Learn More</button>
                </div>
                
                <div class="divider my-8">Components</div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">Card Title</h2>
                            <p>A beautiful card component</p>
                        </div>
                    </div>
                    
                    <div class="card bg-primary text-primary-content">
                        <div class="card-body">
                            <h2 class="card-title">Primary Card</h2>
                            <p>With primary color</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8">
                    <div class="tabs tabs-boxed">
                        <a class="tab tab-active">Tab 1</a>
                        <a class="tab">Tab 2</a>
                        <a class="tab">Tab 3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-laravel-daisyui-starter::layout> 