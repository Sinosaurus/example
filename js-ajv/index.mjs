/*
 * @LastEditors: Sinosaurus
 */
import AjvInstance from './schemas.mjs'
import { ajvSchemas } from './json/json1.mjs'


const exampleJson1 = {
  schemas: {
    fields: { },
    actions: {},
    fn: []
  },
  props: {}
}
const isValid = AjvInstance.validate(ajvSchemas, exampleJson1)

console.log(isValid, AjvInstance.errorsText())