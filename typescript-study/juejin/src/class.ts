/*
 * @LastEditors: Sinosaurus
 */ 

 /**
  * abstract
  */

abstract class Animal {
  abstract makeA(): void
  move(): void {
    console.log('move')
  }
}

// const ani = new Animal()
class Dog extends Animal {
  makeA() {
    console.log(`Dog`)
  }
}

console.log(Dog)
const dog = new Dog()
dog.move()
dog.makeA()


class Car {
  public run() {
    console.log(`running...`)
    // 只能在类中访问
    this.getColor()
    this.sonCanGetFn()
  }
  private getColor() {
    console.log(`color: red`)
  }
  protected sonCanGetFn() {
    console.log('sonCanGetFn')
  }
}

class BatteryCar extends Car {
  constructor() {
    super()
  }
  isHadAllFn() {
    console.log(this)
    this.run()
    // 无法访问
    // this.getColor()
    this.sonCanGetFn()
  }
}

const car = new Car()
car.run()

// car.getColor()
const battery = new BatteryCar()
battery.isHadAllFn()

// class 可以作为接口

class Props {
  speed: number = 500 // 默认值
  height: number = 160
}
const defaultProps = new Props()

const pp: Props = {
  speed: 99,
  height: 77
}
// 通过使用类，可以让 defaultProps跟 pp 统一管理