import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";
import os from 'node:os';

function detectLanHost() {
    for (const nets of Object.values(os.networkInterfaces())) {
        for (const net of nets ?? []) {
            if (net.family === 'IPv4' && !net.internal) {
                return net.address;
            }
        }
    }
    return 'localhost';
}

const vitePort = 5173;
const lanHost = process.env.VITE_HOST ?? detectLanHost();

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',
        port: vitePort,
        origin: `http://${lanHost}:${vitePort}`,
        hmr: { host: lanHost },
        cors: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
