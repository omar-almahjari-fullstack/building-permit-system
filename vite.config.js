import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                 'resources/css/app.css',
                 'resources/css/Reports.css',
                 'resources/js/Reports.js',
                 'resources/css/requests.css',
                 'resources/js/app.js',
                 'resources/js/loction.js',
                 'resources/css/layouts/admin/master.css',
                 'resources/css/layouts/admin/bootstrap.min.css',
                 'resources/css/layouts/admin/bootstrap-icons.css',
                 'resources/js/layouts/admin/script.js',
                 'resources/js/layouts/admin/bootstrap.bundle.min.js',
                 'resources/js/layouts/Ajax.js',
                 'resources/js/layouts/ajax-crud.js',
                 'resources/js/layouts/jquery-3.6.0.min.js',
                 'resources/js/platform_user/js/Ajax.js',

                 'resources/js/platform_user/Ajax.js',
                 'resources/js/Breadcrumb.js',
                 'resources/js/chart.js',




                ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
