gulp      = require 'gulp'
changed   = require 'gulp-changed'
filter    = require 'gulp-filter'
imagemin  = require 'gulp-imagemin'
svgSprite = require 'gulp-svg-sprite'
unretina  = require 'gulp-unretina'
config    = require '../config'

gulp.task 'images', ->
  filterRetina = filter '**/*@2x.*'
  filterSvg    = filter '**/*.svg'

  gulp.src config.images.src
    .pipe changed config.images.dest
    .pipe filterRetina
      .pipe unretina()
      .pipe filterRetina.restore()
    .pipe filterSvg
      .pipe svgSprite config.svgSprite
      .pipe filterSvg.restore()
    .pipe imagemin config.images.settings
    .pipe gulp.dest config.images.dest
