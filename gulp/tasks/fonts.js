import gulp from 'gulp'
import browserSync from 'browser-sync'
import concat from 'gulp-concat'
import font2css from 'gulp-font2css'
import handleErrors from '../util/handle-errors'
import config from '../config'

gulp.task('fonts', () =>
  gulp.src(config.fonts.src)
    .pipe(font2css())
    .on('error', handleErrors)
    .pipe(concat(config.fonts.out))
    .pipe(gulp.dest(config.fonts.dest))
    .pipe(browserSync.reload({
      stream: true,
    }))
)
