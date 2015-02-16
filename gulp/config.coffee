nodePath = require './util/nodePath'

src   = './src'
dest  = './public'
debug = true

module.exports =

  src: src

  dest: dest

  environment:
    debug: debug

  sass:
    src:      src + '/sass/*.{sass,scss}'
    dest:     './'
    settings: 
      sourceComments: do -> 'map' if debug
      imagePath:      'public/images'
      includePaths:   [
        nodePath 'modularized-normalize-scss'
        nodePath 'susy/sass'
      ]

  autoprefixer:
    browsers: [ 'last 2 versions' ]

  images:
    src: src + '/images/**'
    dest: dest + '/images'

  phpunit:
    watch: '/**/*.php'
    src: './test/phpunit/**/*.test.php'

  jasmine:
    watch: dest + '/**/*.js'
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
