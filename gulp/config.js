import hasFlag from 'has-flag';
import findupNodeModules from 'findup-node-modules';

const host  = 'local.wordpress.dev';
const src   = './src';
const dest  = './public';
const test  = './test';
const debug = hasFlag('debug');

export default {
  src,
  dest,
  environment: {
    debug
  },
  sass: {
    src: src + '/styles/*.{sass,scss}',
    dest: './',
    settings: {
      sourceComments: debug ? 'map' : null,
      imagePath: 'public/images',
      includePaths: [
        findupNodeModules('modularized-normalize-scss'),
        findupNodeModules('susy/sass')
      ]
    }
  },
  autoprefixer: {
    browsers: ['last 2 versions']
  },
  images: {
    src: src + '/images/**',
    dest: dest + '/images',
    settings: {
      svgoPlugins: [
        {
          cleanupIDs: false
        },
        {
          removeUnknownsAndDefaults: {
            SVGid: false
          }
        }
      ]
    }
  },
  svgSprite: {
    svg: {
      rootAttributes: {
        height: 0,
        width:  0,
        style:  'position: absolute'
      }
    },
    mode: {
      symbol: {
        sprite: 'sprites.svg'
      }
    }
  },
  eslint: {
    src: src + '/scripts/**/*.{js,jsx}'
  },
  phpunit: {
    watch: '/**/*.php',
    src: test + '/phpunit/**/*.test.php'
  },
  tape: {
    watch: '**/*.{js,jsx}',
    src: test + '/tape/**/*.js'
  },
  browserSync: {
    proxy: host,
    files: [
      '*.css',
      '**/*.php',
      dest + '/**',
      '!**/*.map',
      '!' + test + '/**/*.php'
    ]
  },
  browserify: {
    debug: debug,
    extensions: ['.jsx', '.yaml', '.json', '.hbs', '.dust'],
    bundleConfigs: [
      {
        entries: src + '/scripts/app.js',
        dest,
        outputName: 'app.js',
        vendor: false
      }, {
        dest,
        outputName: 'infrastructure.js',
        vendor: true
      }, {
        entries: src + '/scripts/head.js',
        dest,
        outputName: 'head.js'
      }, {
        entries: src + '/scripts/inline.js',
        dest,
        outputName: 'inline.js'
      }
    ]
  }
};
