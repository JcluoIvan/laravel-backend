const mix = require('laravel-mix');

const resourceJS = (jsArr, rpath) => {
    jsArr.forEach((js) => {
        mix.js(js, rpath);
    });
};
const resourceSass = (sassArr, rpath) => {
    sassArr.forEach((sass) => {
        mix.sass(sass, rpath);
    });
};

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
const args = Array.from(process.argv);

mix.sass('resources/sass/base.scss', 'public/css');

resourceJS(
    ['resources/js/core/app.js', 'resources/js/core/storage.js'],
    'public/js/core'
);

resourceSass(
    ['resources/sass/default/index.scss', 'resources/sass/default/theme.scss'],
    'public/css/default'
);

mix.js('resources/js/index.js', 'public/js')

    .js('resources/js/users/index.js', 'public/js/users')
    .version()
    // .sourceMaps()
    .browserSync('backend.demo.net/backend');

// mix.ts('resources/core/app', 'public/js/core')
//     .ts('resources/core/storage', 'public/js/core')
//     // base scss
//     .sass('resources/sass/base', 'public/css')
//     // theme
//     .sass('resources/sass/default.theme', 'public/css/default')
//     .sass('resources/sass/default/index', 'public/css/default')
//     .ts('resources/index', 'public/js')
//     .browserSync('backend.demo.net/backend/system-config');

// mix.sass('resources/sass/default/index.scss', 'public/css/default')
//     .ts('resources/ts/index.ts', 'public/js')
//     .ts('resources/ts/users/index.ts', 'public/users/js')
//     .sourceMaps()
//     .version()
//     .browserSync('backend.demo.net/backend');

// mix.ts(rj('core/app'), 'public/js/core')
//     .ts(rj('core/storage'), 'public/js/core')
//     .js('resources/js/default.js', 'public/js')
//     .sass('resources/sass/default/default.scss', 'public/default/css')
//     .browserSync('backend.demo.net/backend/system-config');
