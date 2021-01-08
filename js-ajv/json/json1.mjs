/*
 * @Descripttion:
 * @version:
 * @Author: lurongwei
 * @Date: 2020-11-11 18:13:30
 * @LastEditors: Sinosaurus
 * @LastEditTime: 2021-01-08 10:55:04
 */

export const properties = {
  type: 'object',
  properties: {
    fields: {
      type: 'object'
    },
    labelWidth: {
      type: 'string'
    },
    labelPosition: {
      type: 'string'
    },
    labelSuffix: {
      type: 'string'
    }
  },
  required: ['fields']
}

export const ajvSchemas = {
  type: 'object',
  title: 'json1',
  description: 'schema 基本的配置',
  properties: {
    schemas: {
      type: 'object',
      description: 'schema 的配置',
      properties: {
        fields: {
          type: 'object',
          description: '所有字段的集合'
        },
        actions: {
          type: 'object',
          description: '对应的操作，主要存放组件crud的url及method'
        },
        fn: {
          instanceof:  ["Array", "Function"]
        }
      },
      required: ['fields', 'actions']
    },
    props: {
      type: 'object',
      description: '具体组件的相关配置'
    }
  },
  required: ['schemas', 'props']
}

export const ajvProps = {
  type: 'object',
  properties: {
    getForm: properties,
    putForm: properties,
    postForm: properties,
    getDialog: properties,
    putDialog: properties,
    postDialog: properties
  }
}
