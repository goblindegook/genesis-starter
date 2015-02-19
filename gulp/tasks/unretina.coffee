changed  = require 'gulp-changed'
gulp     = require 'gulp'
imagemin = require 'gulp-imagemin'
unretina = require 'gulp-unretina'
config   = require '../config'

gulp.task 'unretina', ->
  gulp.src config.images.src + '/*@2x.*'
    .pipe changed config.images.dest
    .pipe unretina()
    .pipe imagemin()
    .pipe gulp.dest config.images.dest
