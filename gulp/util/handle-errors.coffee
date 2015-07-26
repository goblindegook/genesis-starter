notify = require 'gulp-notify'

module.exports = (error) ->

  # Send error to notification center with gulp-notify
  notify.onError(
    title: 'Compile Error',
    message: "<%= error %>"
  ).apply @, arguments

  # Keep gulp from hanging on this task
  @emit 'end'
