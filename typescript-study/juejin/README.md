# Typescript

## 原始类型
+ `boolean`
+ `number`
+ `string`
+ `void`
+ `undefined`
+ `null`
+ `symbol`
+ `bigint`

## 其他类型
+ 顶级类型
  - `any`
  - `unknown` any类型对应的安全类型，在对unknown类型的值执行大多数操作之前,我们必须进行某种形式的检查,而在对 any 类型的值执行操作之前,我们不必进行任何检查
+ 底部类型
  - `never`
+ 非原始类型
  - `object`
    + 数组 两种定义方式
      - 泛型 `Array<number>`
      - `number[]`
    + `元组`(Tuple) 表示一个已知元素数量和类型的数组，各元素的类型不必相同。
      