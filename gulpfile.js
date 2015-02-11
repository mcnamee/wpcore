/*!
 * gulp
 * $ sudo npm install gulp-sass gulp-minify-html gulp-autoprefixer gulp-minify-css gulp-jshint gulp-uglify gulp-rename gulp-livereload gulp-rev gulp-rev-replace del --save-dev
 */

/*  Load plugins 
    ************************* */
    var gulp = require('gulp'),
        sass = require('gulp-sass'),
        minifycss = require('gulp-minify-css'),
        autoprefixer = require('gulp-autoprefixer'),
        jshint = require('gulp-jshint'),
        uglify = require('gulp-uglify'),
        rename = require('gulp-rename'),
        concat = require('gulp-concat'),
        livereload = require('gulp-livereload'),
        usemin = require('gulp-usemin'),
        del = require('del'),
        minifyHTML = require('gulp-minify-html'),
        rev = require('gulp-rev'),
        revReplace = require('gulp-rev-replace');


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