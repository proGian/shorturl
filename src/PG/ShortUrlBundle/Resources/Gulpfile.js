'use strict';

var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

gulp.task('copybootstrap', function () {
//    // copy less
    gulp.src(
            [
                './node_modules/bootstrap/less/**/*.*',
                '!./node_modules/bootstrap/less/grid.less'
            ])
            .pipe(gulp.dest('./libs/bootstrap'));

    // compile less
    gulp.src(['./node_modules/bootstrap/less/variables.less', './node_modules/bootstrap/less/mixins.less', './node_modules/bootstrap/less/grid.less'])
            .pipe(plugins.concat('grid.less'))
            .pipe(plugins.less())
            .pipe(plugins.rename('grid.less'))
            .pipe(gulp.dest('./libs/bootstrap'));

//    // copy fonts
    gulp.src(['./node_modules/bootstrap/fonts/*'])
            .pipe(gulp.dest('./public/fonts'));

});

gulp.task('build-dev', function () {
    gulp.src(['./less/main.less'])
            .pipe(plugins.less())
            .pipe(plugins.rename('main.css'))
            .pipe(gulp.dest('./public/css'));
});

gulp.task('stylewatch', function () {
    gulp.watch(['./less/**/*.less'], ['build-dev']);
});


gulp.task('default', ['copybootstrap', 'build-dev', 'stylewatch']);
