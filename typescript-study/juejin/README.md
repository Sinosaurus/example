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

+ 为枚举添加静态方法


#### 反向映射

> eg

```ts
```


### 接口 `interface`

  ```ts
  interface User {
    str: string,
    num: number
  }
  ```

+ 可选属性

  ```ts
    interface User {
      str: string,
      num: number,
      age?: number,
      say: (words: string) => string
    }
  ```

+ 只读属性

  ```ts
  interface User {
    str: string,
    num: number,
    readonly sex: string
  }
  ```

+ 属性检查  
  
  ```ts
    interface Config {
      width?: number
    }
    function calculateAreas (config: Config): {area: number} {
      let square = 100
      if (config.width) square = config.width * config.width
      return { area: square }
    }
    const mySquare = calculateAreas({ widtha: 5 })
  ```

  > 当传入参数有问题（`widtha`不是 `width`）时，可以通过下列三种方式进行解决

  - 类型断言

    ```ts
      const mySquare = calculateAreas({ widtha: 5 } as Config)
    ```
  
  - 添加字符串索引签名

    ```ts
      interface Config {
        width?: number
        [propName: string]: any // Config此时可以有任意类型
      }
    ```

   +  将字面量赋值给另一个变量

     ```ts
        const options: any = { widtha: 5 }
        const mySquare = calculateAreas(options)
     ```

+ 可索引类型

  ```ts
    interface Phone {
      [name: string]: string
    }
    interface User {
      name: string
      age?: number
      phone: Phone
    }
    const xiaoming: User = {
      name: '小明',
      phone: [
        a: 1,
        b: 2
      ]
    }
  ```

+ 继承接口

  在原有基础接口上，额外添加一些其他属性

  ```ts
    interface InUser {
      name: string
      age?: number
    }

    interface InSome {
      email: string
    }

    interface VIPUser extends InUser {
      level: string // 等级
    }

    interface SuperUser extends InUser, InSome {
      vip: number
    }
  ```

### class

  + 抽象类 `abstract` 抽象类做为其它派生类的基类使用,它们一般不会直接被实例化

    ```ts
      abstract class Animal {
        abstract makeSound(): void
        move (): void {
          console.log(';')
        }
      }
      // 此处会报错，不允许直接实例化
      const ani = new Animal()

      class Cat extends Animal {
        makeSound () {
          console.log('11')
        }
      }
    ```

  + 访问限定符

    + `public` 默认为 public, 被此限定符修饰的成员是可以被外部访问。
    + `private` 被此限定符修饰的成员是只可以被类的内部访问 【子类无法访问】
    + `protected` 被此限定符修饰的成员是只可以被类的内部以及类的子类访问

  + class 可以作为接口

    > 我们用一个 class 起到了接口和设置初始值两个作用，方便统一管理，减少了代码量
    
    ```
      interface -- 接口只声明成员方法，不做实现
      class -- 类声明并实现方法
    ```

### function

+ 参数详解

  + 可选参数 `?`
    
    ```ts
      function add (a:number, b?:number) {
        return a + (b || 0)
      }
    ```

   + 默认参数

     ```ts
        function add (a: number, b = 1) {
          return a + b
        }
     ``` 

  + 剩余参数 `...rest`'

      ```ts
        function add (a: number, ...rest: number[]) {
          return rest.reduce((a, n) => a + n ,a)
        }
      ```

+ 重载 `overload`

  