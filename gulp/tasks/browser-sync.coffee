browserSync = require 'browser-sync'
gulp        = require 'gulp'
config      = require '../config'

gulp.task 'browser-sync', ['build'], ->
  browserSync config.browserSync
