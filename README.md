# Genesis Starter

A Genesis Framework starter theme with Gulp support.  I took StudioPress' original Genesis Sampler theme and added my stuff.

## Setup

1. Clone this repository and change the theme's name.
2. There is no `style.css` in the root, that is built by Gulp. The header comment metadata can be edited at `src/sass/_meta.scss`.
3. Run `npm install` to setup the build tools.
4. Run `gulp build` to generate public site assets from sources.

## CSS Preprocessor Support

Genesis Starter uses Sass out of the box, but it should not be at all hard to configure a Gulp task to handle different preprocessors (such as LESS or Stylus).

## JavaScript, CoffeeScript and Browserify

The Starter uses Browserify to better allow modularization of client-side code using CommonJS modules.

By default, your code is concatenated into a file called `app.js`, while external dependencies (installed using NPM) are concatenated into `infrastructure.js`.

The Browserify build process handles CoffeeScript transparently, so you can code in either language.

## License

Genesis Starter is released under the GPL 2.0 Free Software License.
