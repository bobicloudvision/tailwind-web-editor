import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    plugins: [
        viteStaticCopy({
            targets: [
                {
                    src: path.resolve(__dirname, './js') + '/[!.]*', // 1️⃣
                    dest: './js', // 2️⃣
                },
                {
                    src: path.resolve(__dirname, './img') + '/[!.]*', // 1️⃣
                    dest: './img', // 2️⃣
                },
            ],
        }),
        laravel({
            input: [
                "themes/hotel_roberto/scss/style.scss",
            ],
            buildDirectory: "themes/hotel_roberto",
        }),

        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    resolve: {
        alias: {
            '@': '/themes/hotel_roberto/js',
            '~bootstrap': path.resolve('node_modules/bootstrap'),
        }
    },

});
