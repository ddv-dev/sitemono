import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/calculator/calculator.js',
                'resources/js/calculator/init.js',
            ],
            refresh: true,
        }),
    ],

});