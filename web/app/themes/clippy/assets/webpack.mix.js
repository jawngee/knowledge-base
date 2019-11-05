let mix = require('laravel-mix');
let ImageminPlugin = require('imagemin-webpack-plugin').default;
let imageminMozjpeg = require('imagemin-mozjpeg');
let CopyWebpackPlugin = require('copy-webpack-plugin');
let del = require('del');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

let dev = !mix.inProduction();

mix.webpackConfig({
    devtool: (dev) ? 'source-map' : false,
    externals: {
        "jquery": "jQuery"
    },
    plugins: [
        new CopyWebpackPlugin([{
            from: 'img',
            to: '../public/img', // Laravel mix will place this in 'public/img'
        }]),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            svgo: {
                plugins: [
                    {removeViewBox: false},
                    {removeDimensions: true},
                    {cleanupIDs: {
                            prefix: {
                                toString() {
                                    this.counter = this.counter || 0;

                                    return `id-${this.counter++}`;
                                }
                            }
                        }}
                ]
            },
            plugins: [
                imageminMozjpeg({
                    quality: 80,
                })
            ]
        })
    ]
});

mix.setPublicPath('../public')
    .ts('js/clippy.ts', 'js/')
    .ts('js/clippy-admin.ts', 'js/')
    .copy('fonts/', '../public/fonts/')
    .sass('css/clippy.scss', 'css/')
    .sass('css/clippy-admin.scss', 'css/')
    .sourceMaps(dev)
    .browserSync({
        snippetOptions: {
            rule: {
                match: /<\/body>/i,
                fn: function (snippet, match) {
                    return snippet + match;
                }
            }
        },
        port: 3000,
        proxy: "http://kb.mediacloud.test",
        files: [
            '../public/css/**/*',
            '../views/**/*'
        ],
        ui: {
            port: 4001
        },
        ghostMode: false
    })
    .options({
        autoprefixer: {
            options: {
            }
        },
        terser: {
            terserOptions: {
                extractComments: 'all',
                compress: {
                    drop_console: true,
                },
            }
        },
        processCssUrls: false
    });

if (!dev) {
    del('../public/js/*.map', {force: true});
    del('../public/css/*.map', {force: true});
}

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.preact(src, output); <-- Identical to mix.js(), but registers Preact compilation.
// mix.coffee(src, output); <-- Identical to mix.js(), but registers CoffeeScript compilation.
// mix.ts(src, output); <-- TypeScript support. Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.fastSass('src', output); <-- Alias for mix.standaloneSass().
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.test');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.babelConfig({}); <-- Merge extra Babel configuration (plugins, etc.) with Mix's default.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.extend(name, handler) <-- Extend Mix's API with your own components.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
