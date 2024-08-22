import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/fontawesome/css/fontawesome.min.css',
                'resources/css/fontawesome/css/brands.min.css',
                'resources/css/fontawesome/css/solid.min.css',
                'resources/js/app.js',
                'resources/css/filament/events/theme.css'
            ],
            refresh: true,
        }),
    ],
});
