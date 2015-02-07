path = require 'path'

module.exports = 

  path: (relativePath) -> path.join __dirname, '../../node_modules', relativePath
