changed  = require 'gulp-changed'
gulp     = require 'gulp'
imagemin = require 'gulp-imagemin'
unretina = require 'gulp-unretina'
config   = require '../config'

gulp.task 'images', ->
  gulp.src config.images.src
    .pipe changed config.images.dest
    .pipe unretina()
    .pipe imagemin()
    .pipe gulp.dest config.images.dest
