let mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix
  .sass('./src/scss/app.scss', './dist/css/app.css')
  .js('./src/js/app.js', './dist/js/app.js')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
  })
