path = require 'path'

module.exports = (relativePath) ->
    path.join __dirname, '../../node_modules', relativePath
