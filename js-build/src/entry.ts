/*
 * @LastEditors: Sinosaurus
 */ 
import chalk from 'chalk'
import a from './test'
const log = console.log

function _interopRequireDefault(obj:any) {
  return obj && obj.__esModule ? obj : { default: obj }
}
const _a = _interopRequireDefault(a)

log(chalk.blue(JSON.stringify(_a)))

// test.ts
// Object.defineProperty(exports, '__esModule', {
//   value: true
// })
// const rd = 1
export default _a

