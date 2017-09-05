var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyJs = require('gulp-uglify');
var minifyCss = require('gulp-cssmin');
var browserSync = require('browser-sync');

var paths = {
  css: './dev/css/**/*.css',
  img: './dev/img/**/*',
  js: './dev/js/**/*.js',
  php: './dev/php/**/*.php',
  html: './dev/**/*.html',
  sass: './dev/partials/sass/**/*',
  jsPartial: './dev/partials/js/**/*'
};

var dests = {
  css: './dist/css/',
  img: './dist/img/',
  js: './dist/js/',
  php: './dist/php/',
  html: './dist/'
};

gulp.task('default', ['server', 'watch']);

gulp.task('sass-compile', function() {
  return gulp.src('./dev/partials/sass/main.scss')
    .pipe(sass()).on('error', sass.logError)
    .pipe(minifyCss())
    .pipe(gulp.dest('./dev/css/'));
});

gulp.task('js-concat', function() {
  return gulp.src([
    'dev/partials/js/vendors/jquery.js',
    'dev/partials/js/vendors/bootstrap.js',
    'dev/partials/js/vendors/angular.js',
    'dev/partials/js/vendors/angular-route.js',
    'dev/partials/js/vendors/angular-animate.js',
    'dev/partials/js/app.js',
    'dev/partials/js/controllers/homeController.js',
    'dev/partials/js/controllers/convitesController.js',
    'dev/partials/js/controllers/midiasController.js'
  ])
    .pipe(concat('main.js'))
    .pipe(minifyJs({ mangle: false }))
    .pipe(gulp.dest('dev/js'));
});

gulp.task('copy', ['sass-compile', 'js-concat'], function(done){
    gulp.src(paths.css).pipe(gulp.dest(dests.css));
    gulp.src(paths.img).pipe(gulp.dest(dests.img));
    gulp.src(paths.js).pipe(gulp.dest(dests.js));
    gulp.src(paths.php).pipe(gulp.dest(dests.php));
    gulp.src(paths.html).pipe(gulp.dest(dests.html)).on('end',done);
});

gulp.task('img-compress', ['copy'], function() {
  return gulp.src(dests.img)
    .pipe(imagemin())
    .pipe(gulp.dest(dests.img));
});

gulp.task('server', ['img-compress'], function() {
  browserSync.init({
    server: {
      baseDir: 'dev'
    }
  });
});

gulp.task('watch', function() {
  gulp.watch(paths.sass, ['sass-compile']).on('change', browserSync.reload);
  gulp.watch(paths.jsPartial, ['js-concat']).on('change', browserSync.reload);
  gulp.watch(paths.img).on('change', browserSync.reload);
  gulp.watch(paths.php).on('change', browserSync.reload);
  gulp.watch(paths.html).on('change', browserSync.reload);
});
