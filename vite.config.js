import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        host: '0.0.0.0', // Allow access from Docker/Laradock
        port: 5173,      // Ensure this matches your exposed port
        strictPort: true,
        hmr: {
          host: 'localhost', // Use the host Laravel is running on
          port: 5173,        // Match the Vite server port
        },
      },
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
});
