var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
var cache = require('gulp-cache');
var del = require('del');

// BrowserSync Start
function browserSyncInit(done) {
    browserSync.init({
        server: {
            baseDir: ["./", "./resources", "./resources/layout"]
        },
        port: 3000
    });
    done();
};

// BrowserSync Reload
function browserSyncReload(done) {
  browserSync.reload();
  done();
};

// Cleans: "layout" folder, image cache
function cleanLayout(done) {
    del.sync(['resources/layout/css/*']);
    cache.clearAll();
    done();
}

// Cleans: "public/assets" folder, image cache
function cleanAssets(done) {
    del.sync(['public/assets/*.html']);
    cache.clearAll();
    done();
}

// Process scss
function css() {
    return gulp.src('resources/scss/**/*.scss') // Gets all files ending with .scss in src/scss and children dirs
    .pipe(sass().on('error', sass.logError)) // Passes it through a gulp-sass, log errors to console
    .pipe(gulp.dest('resources/layout/css')) // Outputs it in the css folder
    .pipe(browserSync.stream());
};

// Optimizing CSS and JavaScript, processes also HTML
function distCssJs() {
    return gulp.src('resources/layout/*.html')
    .pipe(useref())
    .pipe(gulpIf('*.js', uglify()))
    .pipe(gulpIf('*.css', cssnano({
        discardComments: {removeAll: true}
    })))
    .pipe(gulp.dest('public/assets'));
}

// Watch files for changes
function watchFiles() {
    gulp.watch('resources/scss/**/*.scss', css);
    gulp.watch('resources/layout/*.html', browserSyncReload);
    gulp.watch('resources/javascript/**/*.js', browserSyncReload);
}

// Tasks
// ------------------

// Build the project
gulp.task('build', gulp.series(
    cleanLayout,
    css,
    gulp.parallel(
        distCssJs
    ),
    cleanAssets,
    cleanLayout
));

gulp.task('clean', gulp.series(
    cleanLayout
));

// Developement - serve layout directory with hot reload
gulp.task('devel', gulp.parallel(
    gulp.series(
        css,
        browserSyncInit
    ),
    watchFiles
));
