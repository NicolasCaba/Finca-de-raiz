const { src, dest, watch, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const terser = require('gulp-terser-js');
const rename = require('gulp-rename');
import imagemin from 'gulp-imagemin';
const notify = require('gulp-notify');
const cache = require('gulp-cache');
const webp = require('gulp-webp');

// Paths
const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    images: 'src/img/**/*'
}

// css function
function css() {
    return src(paths.scss)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('./build/css'));
}

// Parse and sourcemaps javascript
function javascript() {
    return src(paths.js)
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(dest('./build/js'));
}

// Minify images
function images() {
    return src(paths.images)
        .pipe(cache(imagemin({optimizationLevel: 3})))
        .pipe(dest('build/img'))
        .pipe(notify({message: 'Imagen completada'}));
}

// Generate webp images
function webpVersion() {
    return src(paths.images)
        .pipe(webp())
        .pipe(dest('build/img'))
        .pipe(notify({message: 'Imagen webp completa'}));
}

// Stage files
function watchFiles() {
    watch(paths.scss, css);
    watch(paths.js, javascript);
    watch(paths.images, images);
    watch(paths.images, webpVersion);
}

exports.default = parallel(css, javascript, images, webpVersion, watchFiles);