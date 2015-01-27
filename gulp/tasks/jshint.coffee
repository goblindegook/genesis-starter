gulp   = require 'gulp'
jshint = require 'gulp-jshint'
config = require '../config'

gulp.task 'jshint', ->
  gulp.src config.jshint.src
    .pipe jshint()
    .pipe jshint.reporter config.jshint.reporter
