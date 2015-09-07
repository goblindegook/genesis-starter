import gulp from 'gulp';
import browserSync from 'browser-sync';
import gulpIf from 'gulp-if';
import minifyCss from 'gulp-minify-css';
import sass from 'gulp-sass';
import scssLint from 'gulp-scss-lint';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';
import handleErrors from '../util/handle-errors';
import config from '../config';

gulp.task('sass', ['images'], () =>
  gulp.src(config.sass.src)
    .pipe(gulpIf(config.debug, sourcemaps.init()))
    .pipe(scssLint())
    .pipe(sass(config.sass.settings))
    .on('error', handleErrors)
    .pipe(autoprefixer(config.autoprefixer))
    .pipe(minifyCss({
      keepSpecialComments: '*'
    }))
    .pipe(gulpIf(config.debug, sourcemaps.write()))
    .pipe(gulp.dest(config.sass.dest))
    .pipe(browserSync.reload({
      stream: true
    }))
);
