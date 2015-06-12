'use strict';

/* Import plugins
------------------------------------- */

var gulp 		= require('gulp');
var less        = require('gulp-less'); 
var concat 		= require('gulp-concat');
var uglify 		= require('gulp-uglify');
var ngAnnotate 	= require('gulp-ng-annotate');
var gutil       = require('gulp-util'); 
var watch       = require('gulp-watch');
 
/* JS compilation and minification
------------------------------------- */

gulp.task('js', function() {

	var files = [
        './assets/vendor/jquery/dist/jquery.js',
        './assets/vendor/bootstrap/dist/js/bootstrap.js',
        './assets/vendor/lodash/lodash.js',
        './assets/vendor/highlight.js/highlight.pack.js',
		'./assets/vendor/angular/angular.js',
		'./assets/js/app.js'
	];

    gulp.src(files)
    	.pipe(ngAnnotate())
    	.pipe(uglify())
    	.pipe(concat('app.min.js'))
    	.pipe(gulp.dest('./assets/js'))
});

/* LESS compilation and minification
------------------------------------- */

gulp.task('less', function() {

    return gulp.src('./assets/less/index.less')
        .pipe(less())
        .pipe(concat('app.min.css'))
        .pipe(gulp.dest('./assets/css'));
});

/* Watch for changed files, execute tasks
------------------------------------- */

gulp.task('watch', function() {

    gulp.watch('./assets/js/*.js', ['js']);
    gulp.watch('./assets/less/*.less', ['less']);
});

/* Default task 
------------------------------------- */

gulp.task('default', ['js', 'less', 'watch']);