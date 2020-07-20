// 工厂模式  其实就是将创建对象的过程单独封装
class User {
  constructor (name, age, type, work) {
    this.name = name
    this.age = age
    this.type = type
    this.work = work
  }
}

class Factory {
  constructor(user, age, type) {
    return (new User(user, age, type, this.judgeType(type)))
  }
  judgeType (type) {
    let work
    switch (type) {
      case 'a':
        work = ['a', 'b']
        break
      case 'b':
        work = ['c', 'd']
        break
      default:
        work = []
        break
    }
    return work
  }
}
const user1 = new Factory('long', 18, 'a')
console.log(user1 instanceof Factory, user1 instanceof User)