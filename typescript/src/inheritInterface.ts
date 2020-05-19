/*
 * @LastEditors: Sinosaurus
 */
export function inheritInterface () {
  // 接口继承

  // 接口继承接口
  interface InTwoPoint {
    x: number,
    y: number
  }
  // 继承一个
  interface InThreePoint extends InTwoPoint {
    z: number
  }

  const threePoint:InThreePoint = {
    z: 100,
    x: 100,
    y: 100
  }

  interface InPeopleAge {
    age: number
  }
  interface InPeopleName {
    name: string
  }
  // 继承多个
  interface InPeople extends InPeopleAge, InPeopleName {
    eat ():void
  }

  const people1:InPeople = {
    age: 10,
    name: '我是',
    eat () {}
  }

  // 接口继承类
  class Bird {
    type: string = '画眉'
    fly():void {}
  }
  interface InBird extends Bird {}
  
  const bird:InBird = {
    type: '鸟',
    fly () {}
  }
}