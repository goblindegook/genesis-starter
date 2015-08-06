gulp      = require 'gulp'
filter    = require 'gulp-filter'
imagemin  = require 'gulp-imagemin'
plumber   = require 'gulp-plumber'
svgSprite = require 'gulp-svg-sprite'
unretina  = require 'gulp-unretina'
config    = require '../config'

gulp.task 'images', ->
  filterRetina = filter '**/*@2x.*', {restore: true}
  filterSvg    = filter '**/*.svg', {restore: true}

  gulp.src config.images.src
    .pipe plumber()

    # Generate standard density images from Retina
    .pipe filterRetina
      .pipe gulp.dest config.images.dest
      .pipe unretina()
      .pipe filterRetina.restore

    # Generate SVG sprites
    .pipe filterSvg
      .pipe svgSprite config.svgSprite
      .pipe filterSvg.restore

    .pipe imagemin config.images.settings
    .pipe gulp.dest config.images.dest
