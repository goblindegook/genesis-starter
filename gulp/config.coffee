{log, colors}     = require 'gulp-util'
hasFlag           = require 'has-flag'
findupNodeModules = require 'findup-node-modules'

host  = 'local.wordpress.dev'
src   = './src'
dest  = './public'
test  = './test'
debug = hasFlag 'debug'

module.exports =

  src: src

  dest: dest

  environment:
    debug: debug

  sass:
    src:      src + '/styles/*.{sass,scss}'
    dest:     './'
    settings:
      sourceComments: do -> 'map' if debug
      imagePath:      'public/images'
      includePaths:   [
        findupNodeModules 'modularized-normalize-scss'
        findupNodeModules 'susy/sass'
      ]

  autoprefixer:
    browsers: [ 'last 2 versions' ]

  images:
    src: src + '/images/**'
    dest: dest + '/images'
    settings:
      svgoPlugins: [
        cleanupIDs: false
      ,
        removeUnknownsAndDefaults:
          SVGid: false
      ]

  svgSprite:
    svg:
      rootAttributes:
        height: 0
        width: 0
        style: 'position:absolute'
    mode:
      symbol:
        sprite: 'sprites.svg'

  eslint:
    src: src + '/scripts/**/*.{js,jsx}'

  phpunit:
    watch: '/**/*.php'
    src:   test + '/phpunit/**/*.test.php'

  tape:
    watch: '**/*.{js,jsx}'
    src:   test + '/tape/**/*.js'

  eslint:
    src: src + '/scripts/**/*.{js,jsx}'

  browserSync:
    proxy: host
    files: [
      '*.css'
      '**/*.php'
      dest + '/**'
      '!**/*.map' # Exclude sourcemaps
      '!' + test + '/**/*.php' # Exclude PHPUnit tests
    ]

  browserify:
    debug: debug,
    # Additional file extentions to make optional
    extensions: ['.jsx', '.coffee', '.cson', '.yaml', '.json', '.hbs', '.dust']
    # A separate bundle will be generated for each
    # bundle config in the list below
    bundleConfigs: [
      entries: src + '/scripts/app.js'
      dest: dest
      outputName: 'app.js'
      vendor: false
    ,
      dest: dest
      outputName: 'infrastructure.js'
      vendor: true
    ,
      entries: src + '/scripts/head.js'
      dest: dest
      outputName: 'head.js'
    ,
      entries: src + '/scripts/inline.js'
      dest: dest
      outputName: 'inline.js'
    ]
