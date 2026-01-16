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
    server: {
        host: '0.0.0.0', // Agar bisa diakses dari luar container
        port: 5173,      // Paksa tetap di 5173
        strictPort: true, // Jangan pindah ke 5174 kalau 5173 penuh
        hmr: {
            host: 'localhost',
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
            usePolling: true, // WAJIB untuk Docker agar perubahan file terdeteksi
        },
    },

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
});
