const {src, dest, series, parallel, watch} = require('gulp');
const yargs = require('yargs');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const gulpif = require('gulp-if');
const sourcemaps = require('gulp-sourcemaps');
const imagemin = require('gulp-imagemin');
const del = require('del');
const webpack = require('webpack-stream');
const uglify = require('gulp-uglify');
const named = require('vinyl-named')
const browserSync = require('browser-sync');
const zip = require('gulp-zip');
const replace = require('gulp-replace');



const PRODUCTION = yargs.argv.prod;

const server = browserSync.create();

const paths = {
    style: {
        src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
        dest: 'dist/assets/css'
    },
    script: {
        src: ['src/assets/js/bundle.js', 'src/assets/js/admin.js', 'src/assets/js/customize-preview.js'],
        dest: 'dist/assets/js'
    },
    images: {
        src: 'src/assets/img/**',
        dest: 'dist/assets/img'
    },
    other: {
        src: ['src/assets/**/*', '!src/assets/{img,js,scss}', '!src/assets/{img,js,scss}/**/*'],
        dest: 'dist/assets'
    },
    package: {
        src: ['**/*', '!.vscode', '!node_modules{,/**}', '!package{,/**}', '!scr{,/**}', '!.gitignore', '!gulpfile.bablel.js',
            '!package.json', '!package-lock.json'],
        dest: 'package'
    }
}

const clean = () => del(['dist']);

const style = () => {
    return src(paths.style.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(dest(paths.style.dest))
        .pipe(server.stream());
}

const script = () => {
    return src(paths.script.src)
        .pipe(named())
        .pipe(webpack({
            module: {
                rules: [
                  {
                    test: /\.js$/,
                    use: {
                      loader: 'babel-loader',
                      options: {
                        presets: ['@babel/preset-env']
                      }
                    }
                  }
                ]
            },
            output: {
                filename: '[name].js'
            },
            devtool: !PRODUCTION ? 'inline-source-map' : false,
            mode: 'development'
        }))
        .pipe(gulpif(PRODUCTION, uglify()))
        .pipe(dest(paths.script.dest));
}

const images = () => {
    return src(paths.images.src)
        .pipe(gulpif(PRODUCTION, imagemin()))
        .pipe(dest(paths.images.dest));
}

const watchs = () => {
   watch('src/assets/scss/**/*.scss', series(style, reload));
   watch('src/assets/js/**/*.js', series(script, reload));
   watch('**/*.php', reload);
   watch(paths.images.src, series(images, reload));
   watch(paths.other.src, series(copy, reload));
}

const serve = (done) => {
    server.init({
        proxy: "http://localhost/firsttheme/"
    })
    done();
}

const reload = (done) => {
    server.reload();
    done();
}

const copy = () => {
    return src(paths.other.src)
        .pipe(dest(paths.other.dest));
}

const comprase = () => {
    return src(paths.package.src)
        .pipe(zip('firsttheme.zip'))
        .pipe(dest(paths.package.dest));
}

exports.zip = comprase;

exports.default = series(clean, parallel(style, images, script, copy), serve, watchs);
exports.buind = series(clean, parallel(style, images, script, copy));