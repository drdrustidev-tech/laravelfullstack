In vite.config.js, ensure your configuration allows network access:

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // Allow connections from any IP
        port: 5173,      // Default Vite port
        hmr: {
            host: '192.168.x.x', // Replace with your local IP address
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

npm run dev -- --host
php artisan serve --host=0.0.0.0 --port=8000


