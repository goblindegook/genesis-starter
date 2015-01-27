gulp   = require 'gulp'
config = require '../config'

gulp.task 'build', ['browserify', 'sass', 'images']
