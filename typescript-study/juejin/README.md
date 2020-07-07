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
      ```ts
        let tupList:[string, number] = ['string', 0]
      ```
    
### 枚举 `enum`

+ 数字枚举  自动累加
  ```ts
    enum Direction {
      Up,
      Down,
      Left,
      Right
    }
    console.log(Direction.Up === 0) // true
    console.log(Direction.Up === 1) // true
    console.log(Direction.Up === 2) // true
    console.log(Direction.Up === 3) // true
  ```

  > eg

  ```ts
    enum Direction {
      Up = 10,
      Down,
      Left,
      Right
    }
    Direction.Down === 11 // true
    Direction.Left === 12 // true
    Direction.Right === 13 // true
  ```

+ 字符串枚举

  ```ts
    enum Direction {
      Up = 'Up',
      Down = 'Down',
      Left = 'Left',
      Right = 'Right'
    }
    Direction['Right'] === 'Right'
    Direction.Up === 'Up'
  ```

+ 异构枚举 字符串与数字混合【很少使用】

  ```ts
    enum StringAndNumber {
      No = 0,
      Yes = 'Yes'
    }
  ```

+ 常量枚举

```ts
const enum Directions {
  Up = 'Up',
  Down = 'Down',
  Left = 'Left',
  Right = 'Right'
}
```

+ 联合枚举类型

  ```ts
    enum Direction1 {
      Up,
      Down,
      Left,
      Right
    }

    let b: Direction1
    // 此时b只能是 Direction1.Up | Direction1.Down | Direction1.Left | Direction1.Right 默认[0, 1, 2, 3]
  ```

+ 枚举合并

  ```ts
    enum Animal1 {
      Dog
    }
    enum Animal1 {
      Cat = 1 // 需要赋值，不然默认0 有冲突
    }
  ```

+ 为枚举添加静态方法  


#### 反向映射

> eg

```ts
  enum Direction {
    Up,
    Down,
    Left,
    Right
  }
  console.log(`
    Direction.Up: ${Direction.Up}
    Direction[0]: ${Direction[0]}
  `)
  /**
   * Direction.Up: 0
     Direction[0]: Up
  */
```


