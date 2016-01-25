import cssCache from './modules/css-cache';

const cachedStyles = window.cachedStyles || {};
const html         = document.documentElement;

html.className = html.className.replace(/\bno-js\b/, 'js');

for (let key in cachedStyles) {
  cssCache.require(key, cachedStyles[key]);
}
