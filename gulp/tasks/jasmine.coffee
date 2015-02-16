gulp    = require 'gulp'
jasmine = require 'gulp-jasmine-phantom'
config  = require '../config'

gulp.task 'jasmine', ->
  gulp.src config.jasmine.specs
    .pipe jasmine integration: true
