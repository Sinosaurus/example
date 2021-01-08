/*
 * @LastEditors: Sinosaurus
 */
// 固定几个类型

export const enumDefault = {
  type: 'string',
  enum: ['one', 'two', 'three']  
}

export const enumNotAllowAdd = {
  type: 'string',
  enum: ['one', 'two', 'three'],
  // additionalItems: false
}