findNodeModules = require 'find-node-modules'
findup          = require 'findup-sync'

findNodeModulePath = (path, [cwd, rest...]) ->
  return unless cwd
  modulePath = findup path, {cwd}
  modulePath or findNodeModulePath path, rest

module.exports = (path) ->
  findNodeModulePath path, findNodeModules {relative: false}
