gulp    = require 'gulp'
phpunit = require 'gulp-phpunit'
config  = require '../config'

gulp.task 'phpunit', ->
  gulp.src config.phpunit.src
    .pipe phpunit()
