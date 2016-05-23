import gulp from 'gulp';
import filter from 'gulp-filter';
import imagemin from 'gulp-imagemin';
import plumber from 'gulp-plumber';
import svgSprite from 'gulp-svg-sprite';
import unretina from 'gulp-unretina';
import config from '../config';

const filterRetina = filter('**/*@2x.*', {
  restore: true
});

const filterSvg = filter('**/*.svg', {
  restore: true
});

gulp.task('images', () =>
  gulp.src(config.images.src)
    .pipe(plumber())
    .pipe(filterRetina)
      .pipe(gulp.dest(config.images.dest))
      .pipe(unretina())
      .pipe(filterRetina.restore)
    .pipe(filterSvg)
      .pipe(svgSprite(config.svgSprite))
      .pipe(filterSvg.restore)
    .pipe(imagemin([
      imagemin.gifsicle(),
      imagemin.jpegtran(),
      imagemin.optipng(),
      imagemin.svgo(config.images.settings.svgo),
    ]))
    .pipe(gulp.dest(config.images.dest))
);
