"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
function dataType() {
    /*
   * @LastEditors: Sinosaurus
   */
    // number
    let n = 20;
    n = NaN;
    n = Infinity;
    // a = 2进制 8进制 16进制表示的数字
    // string
    let s = 'string';
    s = "string";
    s = `string${n}`;
    // boolean
    let b = true;
    b = false;
    b = !!0;
    // 数组
    // Array<数据类型>
    const a = [1, 2, 3];
    // 数据类型[]
    const arr = [1, 2, 3];
    // 元组（Tuple） -- 元组类型允许表示一个已知元素数量和类型的数组，各元素的类型不必相同
    let t = ['a', 11];
    t = ['1', 1];
    t[0] = 'string';
    t[1] = 222;
    // t[2] = true
    // t[2] = 'string' 
    // t[2] = 222
    // void 空值
    let v = undefined;
    // v = null
    // null undefined
    const nu = null;
    const un = undefined;
    // any
    let an = 1;
    an = 's';
    an = true;
    // never
    // 一般不可能返回内容的函数的返回值类型设置
    function error(message) {
        throw new Error(message);
    }
    // error('我是错误信息')
    // object 类型
    const o = [];
    const obj = {};
    // 对象类型
    const obje = { name: 'string', age: 18 };
    // enum 枚举类型
    let Gender;
    (function (Gender) {
        Gender[Gender["male"] = 1] = "male";
        Gender[Gender["female"] = 0] = "female";
        Gender[Gender["unknown"] = -1] = "unknown";
    })(Gender || (Gender = {}));
    const gender = Gender.male;
    // 类型断言
    let str = 'abc';
    // str:any = 1111
    // 类型断言
    const leng = str.length;
    // 类
    class Person {
        constructor(name) {
            this.age = 10;
            this.name = name;
        }
    }
    // 类继承
    class Animal {
        constructor(age) {
            this.age = age;
        }
        eat() {
            console.log('Email eat foot!');
        }
    }
    class Dog extends Animal {
        constructor(type, age) {
            // super
            super(age);
            this.type = type;
        }
        eat() {
            console.log(`${this.type} eat Food!`);
        }
    }
    const dog = new Dog('dog', 20);
    // 重名方法 子类会覆盖父类的方法
    dog.eat();
    // 访问修饰符：
    // 可以在类的成员前，加入访问权限
    /**
     * public 公开的，默认 所有都可以访问
     * private 私有的 只能当前类中进行访问
     * protected 受保护的，只能在当前类或其子类中进行访问
     */
    let Color;
    (function (Color) {
        Color[Color["red"] = 0] = "red";
        Color[Color["blue"] = 1] = "blue";
        Color[Color["skyblue"] = 2] = "skyblue";
    })(Color || (Color = {}));
    class Car {
        constructor() {
            this.color = Color.red;
            this.run();
            this.runCar();
        }
        run() {
            return 'color';
        }
        runCar() {
            return 'run car';
        }
    }
    const byd = new Car();
    console.log(byd.color, 'color');
    // console.log(byd.run(), 'auth')
    class Audi extends Car {
        sayHi() {
            console.log(this.color, 'audi');
        }
    }
    const au = new Audi();
    au.sayHi();
    // au.sayHi()
    class Cat {
        constructor() {
            this.name = '黑猫';
        }
    }
    const cc = new Cat();
    // cc.name = 'blue'
    // 构造函数中 给参数的前面加上 修饰符，相当于 声明了一个属性
    class Test {
        constructor(test) {
            this.test = test;
        }
    }
    // 等同于
    class Test1 {
        constructor(test) {
            this.test = test;
        }
    }
    // 类的存储器
    class Pp {
        constructor() {
            this._name = '';
        }
        get name() {
            return this._name;
        }
        set name(value) {
            // 可以用来校验规则
            if (value.length > 5)
                throw new Error('输入名字的不合法！');
            this._name = value;
        }
    }
    /**
     * get
     * set
     * 可以各自单独使用，含义不同而已
     *
     * get  只读
     * set 设置值
     */
    const pp = new Pp();
    pp.name = '111';
}
exports.dataType = dataType;
