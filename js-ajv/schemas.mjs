import Ajv from 'ajv'
import AjvKeywords from 'ajv-keywords'

const ajv = new Ajv.default({ allErrors: true })
AjvKeywords(ajv, ['typeof', 'instanceof'])

export default ajv
