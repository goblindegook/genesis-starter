gulp   = require 'gulp'
eslint = require 'gulp-eslint'
config = require '../config'

gulp.task 'eslint', ->
  gulp.src config.eslint.src
    .pipe eslint()
    .pipe eslint.format()
