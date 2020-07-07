"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
/*
 * @LastEditors: Sinosaurus
 */
const chalk_1 = __importDefault(require("chalk"));
const test_1 = __importDefault(require("./test"));
const log = console.log;
function _interopRequireDefault(obj) {
    return obj && obj.__esModule ? obj : { default: obj };
}
const _a = _interopRequireDefault(test_1.default);
log(chalk_1.default.blue(JSON.stringify(_a)));
// test.ts
// Object.defineProperty(exports, '__esModule', {
//   value: true
// })
// const rd = 1
exports.default = _a;
