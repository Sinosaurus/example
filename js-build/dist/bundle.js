
    (function (modules) {
      function require(id) {
        const module = { exports: {} }
        modules[id](module, module.exports, require)
        return module.exports
      }
      require('./entry.js')
    })({'./entry.js': (
      function (module, exports, require) { "use strict";

var __importDefault = undefined && undefined.__importDefault || function (mod) {
  return mod && mod.__esModule ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
/*
 * @LastEditors: Sinosaurus
 */
var chalk_1 = __importDefault(require("chalk"));
var test_1 = __importDefault(require("./test"));
var log = console.log;
function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : { default: obj };
}
var _a = _interopRequireDefault(test_1.default);
log(chalk_1.default.blue(JSON.stringify(_a)));
// test.ts
// Object.defineProperty(exports, '__esModule', {
//   value: true
// })
// const rd = 1
exports.default = _a; }
    )})
  