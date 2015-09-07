import gulp from 'gulp';
import tape from 'gulp-tape';
import config from '../config';

gulp.task('tape', () =>
  gulp.src(config.tape.src)
    .pipe(tape())
);
