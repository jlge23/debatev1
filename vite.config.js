import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/iglesias.js',
                'resources/js/equipos.js',
                'resources/js/eventos.js',
                'resources/js/puntajes.js',
                'resources/js/preguntas.js',
                'resources/js/respuestas.js',
                'resources/js/juegos.js',
                'resources/js/relog.js',
                'resources/js/graficos.js',
                'resources/js/informes.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),'$': 'jQuery'
        }
    },
});
