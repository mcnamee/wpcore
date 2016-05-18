/*!
 * gulp
 * $ sudo npm install gulp gulp-sourcemaps gulp-sass gulp-clean-css gulp-autoprefixer browser-sync --save
 */

/*  Load plugins 
    ************************* */
    var gulp = require('gulp'),
        sourcemaps = require('gulp-sourcemaps'),
        sass = require('gulp-sass'),
        minifycss = require('gulp-clean-css'),
        autoprefixer = require('gulp-autoprefixer'),
        browserSync = require('browser-sync'),
        reload = browserSync.reload;


/*  Styles (gulp styles)
    - Pre-Processes specific scss files into CSS
    - Minifies the CSS
    - Auto prefixes for vendor specificity
    - Generates source maps too
    ************************* */
    gulp.task('styles', function () {
        gulp.src(['assets/scss/main.scss'])
            .pipe(sourcemaps.init())
                .pipe(sass())
                .pipe(autoprefixer({browsers: ['last 5 versions']}))
                .pipe(minifycss())
            .pipe(sourcemaps.write('./'))
            .pipe(gulp.dest('assets/css/'))
            .pipe(reload({stream:true}));
    });

/*  Browser Sync (gulp browserSync)
    - Opens browser-sync watching all php and css files
    - Any change and save will auto-update in the browser
    ************************* */
    gulp.task('browserSync', function() {

        var files = [
            'assets/css/*.css',
            '*.css',
            './**/*.php'
        ];
     
        browserSync.init(files, {
            proxy: "[[[site_url_gulp]]]",
            notify: false
        });
    });

/*  Default task (gulp)
    - Watches for any scss updates, and compiles the css
    - To start BrowserSync on this task, simply pass the 'browserSync'
    	task into the second parameter array
    ************************* */
    gulp.task('default', ['styles'], function () {

        // Watch .scss files
        gulp.watch('assets/scss/**/*.scss', ['styles']);

    });