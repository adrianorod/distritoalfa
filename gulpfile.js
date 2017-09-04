var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCss = require('gulp-clean-css');
var imagemin = require('gulp-imagemin');
var changed = require('gulp-changed');

var paths = {
  sass: './dev/sass/**/*',
  img: './dev/img/**/*'
};

var dests = {
  css: './dist/css/',
  img: './dist/img/',
  root: './dist/'
};

gulp.task('default', ['sass', 'img', 'watch']);

gulp.task('sass', function () {
  return sass('./dev/sass/main.scss')
    .on('error', sass.logError)
    .pipe(gulp.dest(dests.css))
    .pipe(minifyCss({ keepSpecialComments: 0 }))
    .pipe(gulp.dest(dests.css));
});

gulp.task('img', function() {
  gulp.src(paths.img)
    .pipe(imagemin())
    .pipe(gulp.dest(dests.img));
});

gulp.task('watch', function() {
  gulp.watch(paths.sass, ['sass']);
  gulp.watch(paths.img, ['img']);
});
