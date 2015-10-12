var gulp = require('gulp'),
    connect = require('gulp-connect-multi')(),
    stylus = require('gulp-stylus'),
    jade = require('gulp-jade'),
    spritesmith = require('gulp.spritesmith'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    replace = require('gulp-replace'),
    cssmin = require('gulp-cssmin'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps');

var path = {
    src: 'resources/assets/',
    dest: 'public/'
};

// DEFAULT

gulp.task('stylus', function () {
    gulp.src(path.src + 'stylus/*.styl')
    .pipe(sourcemaps.init())
    .pipe(stylus({'include css': true}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(path.dest + 'css'));
});

gulp.task('watch:stylus', function () {
    gulp.watch([path.src + 'stylus/**/*'], ['stylus']);
    gulp.watch([path.src + 'js/**/*'], ['js']); 
});

// CONNECT

gulp.task('connect', connect.server({
   root: [path.src],
   livereload: true,
   open: {browser: 'chrome'}
}));


gulp.task('stylus:connect', function () {
    return gulp.src(path.src + 'stylus/*.styl')
    .pipe(sourcemaps.init())
    .pipe(stylus({'include css': true}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(path.src + 'css'))
    .pipe(connect.reload());
});

gulp.task('jade', function () {
    return gulp.src(path.src + 'jade/*.jade')
    .pipe(jade({
        pretty: true,
        locals: {style_link: 'style.css'}
    }))
    .pipe(gulp.dest(path.src))
    .pipe(connect.reload());
});

gulp.task('watch:connect', function () {
    gulp.watch([path.src + 'stylus/**/*'], ['stylus:connect']);
    gulp.watch([path.src + 'jade/**/*'], ['jade']);
});

// MAKE

gulp.task('sprite', function () {
    gulp.src(path.src + 'img/icons/*.png')
    .pipe(spritesmith({
        imgName: 'img/icons.png',
        cssName: 'stylus/ext/sprites.styl',
        padding: 50
    }))
    .pipe(gulp.dest(path.src));
});

gulp.task('imagemin', function () {
    return gulp.src(path.src + 'img/*.{jpg,png}')
    .pipe(imagemin({optimizationLevel: 7}))
    .pipe(gulp.dest(path.dest + 'img'));
});

gulp.task('js', function() {
    gulp.src(path.src + 'js/app.js')
    .pipe(uglify({compress: true}))
    .pipe(gulp.dest(path.dest + 'js'))
});

gulp.task('stylus:build', function () {
    gulp.src(path.src + 'stylus/*.styl')
    .pipe(sourcemaps.init())
    .pipe(stylus({'include css': true}))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(path.dest + 'css'));
});




gulp.task('concat', function () {
    return gulp.src([path.src + 'css/fontello.css', src_path + 'css/style.css'])
    .pipe(concat('all.css'))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(src_path + 'css/'));
});

gulp.task('default', ['stylus', 'js', 'watch:stylus']);
gulp.task('watch', ['connect', 'stylus:connect', 'jade', 'watch:connect']);

gulp.task('build', ['stylus:build', 'jade:build', 'imagemin']);
