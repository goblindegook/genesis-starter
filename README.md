# Genesis Starter

A Genesis Framework starter theme with Gulp support.  I took StudioPress' original Genesis Sampler theme and added my stuff.

## Requirements

* [WordPress](https://wordpress.org/)
* [Genesis Framework](http://my.studiopress.com/themes/genesis/)
* [Composer](https://getcomposer.org/)
* [Node](http://nodejs.org/) (for NPM)
* [Gulp](http://gulpjs.com/)
* [Browserify](http://browserify.org/)
* [Sass](http://sass-lang.com/)

## Setup

1. Clone this repository and change the theme's name.
2. There is no `style.css` in the root, that is built by Gulp. The header comment metadata can be edited at `src/sass/_meta.scss`.
3. Run `composer install` to install PHP dependencies.
4. Run `npm install` to setup the build tools and install JavaScript dependencies.
5. Run `gulp build` to generate public site assets from sources.

## CSS Preprocessor Support

Genesis Starter uses Sass out of the box, but it should not be at all hard to configure a Gulp task to handle different preprocessors (such as LESS or Stylus).

## JavaScript, CoffeeScript and Browserify

The Starter uses Browserify to better allow modularization of client-side code using CommonJS modules.

By default, your code is concatenated into a file called `app.js`, while external dependencies (installed using NPM) are concatenated into `infrastructure.js`.

The Browserify build process handles CoffeeScript transparently, so you can code in either language.

## Build Tasks

The Genesis starter provides the following Gulp tasks.

| Task          | Description                                        |
| ------------- | -------------------------------------------------- |
| `browserify`  | Packages JavaScript bundles from their sources.    |
| `browserSync` | Not yet working.                                   |
| `build`       | Runs `browserify`, `sass` and `images`.            |
| `clean`       | Deletes the built assets so you can start afresh.  |
| `default`     | Runs `watch`.                                      |
| `images`      | Copies and compresses image assets.                |
| `jasmine`     | Runs Jasmine specs.                                |
| `jshint`      | Lints your JavaScript code.                        |
| `phpunit`     | Runs PHPUnit test cases.                           |
| `sass`        | Compiles, minifies and concatenates CSS from Sass. |
| `test`        | Runs `jasmine` and `phpunit`.                      |
| `watch`       | Watches files for changes and rebuilds assets.     |

Task parameters may be configured via the _gulp/config.coffee_ file.

## BrowserSync

The `watch` task uses BrowserSync to observe files, automate browser refreshes and allow synchronised testing between different devices on the same site.

In order to do this, BrowserSync creates a local proxy that channels connections to the development site defined in the `browserSync.proxy` entry of _gulp/config.coffee_.

The proxy configuration requires that your WordPress site be available from multiple domain or host names, a feature offered by a plugin such as [WP Hydra](https://wordpress.org/plugins/wp-hydra/) or [Any Hostname](https://wordpress.org/plugins/any-hostname/). (I recommend that you use these plugins for _development only_, since activating them on a public site could severely affect your site's search rankings.)

Feel free to experiment (and report on) different BrowserSync configurations, but from those I've tried this is the one that work best for me.

## License

Genesis Starter is released under the GPL 2.0 Free Software License.
