const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
.override(config => {
    config.module.rules.find(rule =>
        rule.test.test('.svg')
    ).exclude = /\.svg$/;

    config.module.rules.push({
        test: /\.svg$/,
        use: [{ loader: 'html-loader' }]
    })
});

const CKEditorWebpackPlugin = require( '@ckeditor/ckeditor5-dev-webpack-plugin' );

// Define webpack plugins ...
plugins: [
    new CKEditorWebpackPlugin( options ),

    // Other webpack plugins...
    new CKEditorWebpackPlugin( {
        // The main language that will be built into the main bundle.
        language: 'en',

        // Additional languages that will be emitted to the `outputDirectory`.
        // This option can be set to an array of language codes or `'all'` to build all found languages.
        // The bundle is optimized for one language when this option is omitted.
        additionalLanguages: 'all',

        // For more advanced options see https://github.com/ckeditor/ckeditor5-dev/tree/master/packages/ckeditor5-dev-webpack-plugin.
    } ),

];

ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'bold', 'italic', 'link', 'undo', 'redo', 'numberedList', 'bulletedList' ]
    } )
    .catch( error => {
        console.log( error );
    } );





