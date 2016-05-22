import gulp from 'gulp';
import browserSync from 'browser-sync';
import autoprefixer from 'gulp-autoprefixer';
import nano from 'gulp-cssnano';
import gulpIf from 'gulp-if';
import pixrem from 'gulp-pixrem';
import plumber from 'gulp-plumber';
import postcss from 'gulp-postcss';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import reporter from 'postcss-reporter';
import postcssScss from 'postcss-scss';
import stylelint from 'stylelint';
import config from '../config';

const stylelintProcessors = [
  stylelint(),
  reporter({
    clearMessages: true,
    throwError:    false,
  }),
];

gulp.task('sass', ['images'], () =>
  gulp.src(config.sass.src)
    .pipe(plumber())
    .pipe(gulpIf(config.environment.debug, sourcemaps.init()))
    .pipe(postcss(stylelintProcessors, {syntax: postcssScss}))
    .pipe(sass(config.sass.settings))
    .pipe(pixrem())
    .pipe(autoprefixer(config.autoprefixer))
    .pipe(nano())
    .pipe(gulpIf(config.environment.debug, sourcemaps.write()))
    .pipe(gulp.dest(config.sass.dest))
    .pipe(browserSync.reload({
      stream: true
    }))
);
