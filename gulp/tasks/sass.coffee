gulp         = require 'gulp'
browserSync  = require 'browser-sync'
gulpIf       = require 'gulp-if'
minifyCss    = require 'gulp-minify-css'
sass         = require 'gulp-sass'
scssLint     = require 'gulp-scss-lint'
sourcemaps   = require 'gulp-sourcemaps'
autoprefixer = require 'gulp-autoprefixer'
handleErrors = require '../util/handleErrors'
config       = require '../config'

gulp.task 'sass', ['images'], ->
  gulp.src config.sass.src
    .pipe gulpIf config.debug, sourcemaps.init()
    .pipe scssLint()
    .pipe sass config.sass.settings
      .on 'error', handleErrors
    .pipe autoprefixer config.autoprefixer
    .pipe minifyCss { keepSpecialComments: '*' }
    .pipe gulpIf config.debug, sourcemaps.write()
    .pipe gulp.dest config.sass.dest
    .pipe browserSync.reload { stream: true }
