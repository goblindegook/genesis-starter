browserSync = require 'browser-sync'
gulp        = require 'gulp'
config      = require '../config'

gulp.task 'browserSync', ['build'], ->
  browserSync config.browserSync
