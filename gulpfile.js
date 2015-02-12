/*!
 * gulp
 * $ sudo npm install gulp-sass gulp-autoprefixer gulp-minify-css gulp-rename gulp-livereload --save-dev
 */

/*  Load plugins 
    ************************* */
    var gulp = require('gulp'),
        sass = require('gulp-sass'),
        minifycss = require('gulp-minify-css'),
        autoprefixer = require('gulp-autoprefixer'),
        rename = require('gulp-rename'),
        livereload = require('gulp-livereload');


/*  Styles
    ************************* */
    gulp.task('styles', function () {
        gulp.src('scss/main.scss')
            .pipe(sass({style: 'expanded', precision: 10}))
            .pipe(rename({suffix: '.min'}))
            .pipe(autoprefixer({browsers: ['last 5 versions']}))
            .pipe(minifycss())
            .pipe(gulp.dest('css/'));
    });


/*  Default task
    ************************* */
    gulp.task('default', function () {
        gulp.start('styles');
    });


/*  Watch
    ************************* */
    gulp.task('watch', function () {

        // Watch .scss files
        gulp.watch('scss/*.scss', ['styles']);

        // Create LiveReload server
        livereload.listen();

    });