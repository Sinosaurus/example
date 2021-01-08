/*
 * @LastEditors: Sinosaurus
 */
import AjvInstance from './schemas.mjs'
import { ajvSchemas } from './json/json1.mjs'
import { enumDefault, enumNotAllowAdd } from './json/enum.mjs'

const exampleJson1 = {
  schemas: {
    fields: { },
    actions: {},
    fn: []
  },
  props: {}
}
const isValid = AjvInstance.validate(ajvSchemas, exampleJson1)
console.log('isValid', isValid, AjvInstance.errorsText())


const enumDefaultSchema = 'two'
const isValidEnumDefault = AjvInstance.validate(enumDefault, enumDefaultSchema)
console.log('isValidEnumDefault', isValidEnumDefault, AjvInstance.errorsText())

const enumNotAllowAddSchema = 'four'
const isValidEnumNotAllowAdd = AjvInstance.validate(enumNotAllowAdd, enumNotAllowAddSchema)
console.log('isValidEnumNotAllowAdd', isValidEnumNotAllowAdd, AjvInstance.errorsText())
