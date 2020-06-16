'use strict';

require('babel-polyfill');

var a = 111; /*
              * @LastEditors: Sinosaurus
              */


Array.from([1, 2, 4], function (v) {
  return Math.pow(v, v);
});