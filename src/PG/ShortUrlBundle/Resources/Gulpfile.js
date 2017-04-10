'use strict';

var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

gulp.task('copygentelella', function () {

    var g_folders = ['build', 'vendors'];

    g_folders.forEach(function (folder) {
        gulp.src(['./node_modules/gentelella/' + folder + '/**/*.*'])
                .pipe(gulp.dest('./public/vendors/gentelella/' + folder));

    });

});




gulp.task('build-dev', function () {
    gulp.src(['./libs/gentelella/vendors/bootstrap/dist/css/bootstrap.css', './less/main.less'])
            .pipe(plugins.less())
            .pipe(plugins.rename('main.css'))
            .pipe(gulp.dest('./public/css'));
});

gulp.task('stylewatch', function () {
    gulp.watch(['./less/**/*.less'], ['build-dev']);
});


gulp.task('default', ['copygentelella', 'build-dev', 'stylewatch']);
