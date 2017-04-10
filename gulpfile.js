var css = [
 'bower_components/bootstrap/dist/css/bootstrap.css',
];
var js  = [
	'bower_components/jquery/dist/jquery.js', 
	'bower_components/bootstrap/dist/js/bootstrap.js',
];

var gulp = require('gulp');
var uglify = require("gulp-uglify");
var concat = require("gulp-concat");
var cssmin = require("gulp-cssmin");
var stripCssComments = require('gulp-strip-css-comments');
 
gulp.task('minify-css', function(){
	gulp.src(css)
	.pipe(concat('style.min.css'))
	.pipe(stripCssComments({all: true}))
	.pipe(cssmin())
	.pipe(gulp.dest('public/css/'));
});

gulp.task('minify-js', function () {
	gulp.src(js)
	.pipe(concat('script.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('public/js/'))
});


gulp.task('default', function() {
	gulp.start('minify-css', 'minify-js');
});
