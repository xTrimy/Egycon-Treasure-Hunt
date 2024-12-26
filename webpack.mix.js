const mix = require('laravel-mix');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.react()
    .js('resources/js/main.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
        require('autoprefixer'),
    ])
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.tsx?$/,
                    loader: "ts-loader",
                    exclude: /node_modules/
                }
            ]
        },
        resolve: {
            extensions: ["*", ".js", ".jsx", ".vue", ".ts", ".tsx"],
            alias: {
                "@": path.resolve(__dirname, "resources/js")
            }
        }
    })
    ;
