# Change Log

All notable changes to this project will be documented in this file. This project adheres to [Semantic Versioning](http://semver.org/).

## [unreleased]

- **[Changed]** scss_lint replaced with Stylelint for faster processing.

## [1.1.0] - January 3, 2016
- **[Added]** `localStorage` web font caching fallback for JavaScript-disabled browsers.
- **[Added]** Font bundling is now a separate task from Sass processing (`gulp fonts`) and it takes web fonts without requiring you go to [localFont](http://jaicab.com/localFont/).
- **[Changed]** Babel 6 with ES2015, React and Stage 3 support.
- **[Changed]** ESLint uses Airbnb presets with support for Babel and React.
- **[Changed]** JavaScript testing using AVA instead of Tape.

## 1.0.0 – September 8, 2015
- Initial release, based on the Genesis sample theme (version 2.2.0) by StudioPress.
- **[Added]** Gulp asset building pipeline.
- **[Added]** Genesis sample theme styles adapted for SCSS.
- **[Added]** Susy 2.0 grid system.
- **[Added]** Web font loader with localStorage cache.
- **[Added]** JavaScript asset building and optimization via Browserify.
- **[Added]** ECMAScript 2015 support for client-side logic.
- **[Added]** Support for JavaScript modules installed via NPM.
- **[Added]** Support for PHP packages installed via Composer.
- **[Added]** PHPUnit and Tape testing frameworks.
- **[Added]** Linter support for JavaScript and SCSS.
- **[Added]** BrowserSync support.

[unreleased]: https://github.com/goblindegook/genesis-starter/compare/1.0.0...HEAD
[1.1.0]: https://github.com/goblindegook/genesis-starter/compare/1.0.0...1.1.0
