'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const sourceMaps = require('gulp-sourcemaps');

const sassDir = './public/app/assets/scss/**/*.scss';
const cssDir = './public/app/assets/css';

gulp.task('sass', function () {
    return gulp.src(sassDir)
        .pipe(sourceMaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourceMaps.write())
        .pipe(gulp.dest(cssDir));
});

gulp.task('sass:watch', function () {
    gulp.watch(sassDir, ['sass']);
});