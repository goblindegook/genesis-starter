###
browserify task
---------------
Bundle javascripty things with browserify!

This task is set up to generate multiple separate bundles, from
different sources, and to use Watchify when run from the default task.

See browserify.bundleConfigs in gulp/config.js
###

gulp         = require 'gulp'
glob         = require 'glob'
browserify   = require 'browserify'
source       = require 'vinyl-source-stream'
watchify     = require 'watchify'
config       = require '../config'
bundleLogger = require '../util/bundleLogger'
handleErrors = require '../util/handleErrors'
dependencies = (require '../../package.json').dependencies

gulp.task 'browserify', (callback) ->

  bundleQueue = config.browserify.bundleConfigs.length

  browserifyThis = (bundleConfig) ->
    bundler = browserify
      cache: {}
      packageCache: {}
      fullPaths: false
      entries: if bundleConfig.entries then glob.sync bundleConfig.entries
      extensions: config.browserify.extensions
      debug: config.browserify.debug

    # include vendor packages
    if bundleConfig.vendor is true
      bundler.require dep for dep of dependencies

    # expose vendor packages without including them
    if bundleConfig.vendor is false
      bundler.external dep for dep of dependencies

    # uglify code
    unless config.browserify.debug
      bundler.transform { global: true }, 'uglifyify'

    bundle = () ->
      bundleLogger.start bundleConfig.outputName

      bundler.bundle()
        .on 'error', handleErrors
        .pipe source bundleConfig.outputName
        .pipe gulp.dest bundleConfig.dest
        .on 'end', reportFinished

    if global.isWatching
      bundler = watchify bundler
      bundler.on 'update', bundle

    reportFinished = ->
      bundleLogger.end bundleConfig.outputName

      if bundleQueue > 0
        bundleQueue--
        # If queue is empty, tell gulp the task is complete.
        # https://github.com/gulpjs/gulp/blob/master/docs/API.md#accept-a-callback
        callback() if bundleQueue is 0

    bundle()

  # Start bundling with Browserify for each bundleConfig specified
  config.browserify.bundleConfigs.forEach browserifyThis
