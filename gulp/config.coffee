node    = require './util/node'
bourbon = require 'node-bourbon'

src   = './src'
dest  = './public'
debug = true

module.exports =

  src: src

  dest: dest

  environment:
    debug: debug

  sass:
    src: src + '/sass/*.{sass,scss}'
    dest: './'
    settings:
      includePaths: bourbon.with [
        node.path 'susy/sass'
      ]
      sourceComments: do -> 'map' if debug
      imagePath: 'public/images'

  images:
    src: src + '/images/**'
    dest: dest + '/images'

  phpunit:
    src: './test/phpunit/**/*.test.php'

  jasmine:
    specs: dest + '/specs.js'

  jshint:
    src:      src + '/scripts/**/*.js'
    reporter: 'jshint-stylish'

  browserSync:
    proxy: 'local.wordpress.dev'
    files: [
      '**/*.php'
      dest + '/**'
      '!' + dest + '/**.map' # Exclude sourcemaps
    ]

  browserify:
    debug: debug,
    # Additional file extentions to make optional
    extensions: ['.coffee', '.cson', '.yaml', '.json', '.hbs', '.dust']
    # A separate bundle will be generated for each
    # bundle config in the list below
    bundleConfigs: [
      entries: src + '/scripts/app.coffee'
      dest: dest
      outputName: 'app.js'
      vendor: false
    ,
      dest: dest
      outputName: 'infrastructure.js'
      vendor: true
    ,
      entries: src + '/scripts/head.coffee'
      dest: dest
      outputName: 'head.js'
    ,
      entries: './test/jasmine/**/*.spec.{js,coffee}'
      dest: dest
      outputName: 'specs.js'
    ]
