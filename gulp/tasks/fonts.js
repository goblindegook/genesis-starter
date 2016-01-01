import gulp from 'gulp'
import browserSync from 'browser-sync'
import autoprefixer from 'gulp-autoprefixer'
import nano from 'gulp-cssnano'
import sass from 'gulp-sass'
import handleErrors from '../util/handle-errors'
import config from '../config'

gulp.task('fonts', () =>
  gulp.src(config.fonts.src)
    .pipe(sass())
    .on('error', handleErrors)
    .pipe(autoprefixer(config.autoprefixer))
    .pipe(nano({
      discardUnused: false,
    }))
    .pipe(gulp.dest(config.fonts.dest))
    .pipe(browserSync.reload({
      stream: true,
    }))
)
