{log, colors} = require 'gulp-util'
prettyHrtime  = require 'pretty-hrtime'
startTime     = null

module.exports =

  start: (filepath) ->
    startTime = process.hrtime()
    log "Bundled #{colors.green filepath}..."

  end: (filepath) ->
    taskTime   = process.hrtime startTime
    prettyTime = prettyHrtime taskTime
    log "Bundled #{colors.green filepath} in #{colors.magenta prettyTime}"
