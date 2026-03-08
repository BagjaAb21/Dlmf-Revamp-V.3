import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/css/filament/student/theme.css",
            ],
            refresh: true,
        }),
    ],
});
