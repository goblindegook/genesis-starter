gulp   = require 'gulp'
tape   = require 'gulp-tape'
config = require '../config'

gulp.task 'tape', ->
  gulp.src config.tape.src
    .pipe tape()
