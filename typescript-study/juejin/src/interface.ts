/*
 * @LastEditors: Sinosaurus
 */ 

interface User {
  name: string,
  age?: number,
  readonly isMale: boolean,
  say?: (words: string) => string
}
 
function setUser(user: User): User {
  // 不能进行修改
  // user.isMale = false
  return {
    name: user.name,
    isMale: user.isMale
  }
}

setUser({ name: 'Sinosaurs', isMale: false })



/**
 * widtha 不是 width 的解决办法
 */
interface Config {
  width?: number
  // [propName: string]: any
}
function calculateAreas (config: Config): {area: number} {
  let square = 100
  if (config.width) square = config.width * config.width
  return { area: square }
}
// const mySquare = calculateAreas({ widtha: 5 } as Config)

const options: any = { widtha: 5 }
const mySquare = calculateAreas(options)

/**
 * 可枚举类型
 * phone
 */
interface Phone {
  [name: string]: string
}
interface User1 {
  name: string
  age?: number
  phone: Phone
}
const xiaoming: User1 = {
  name: '小明',
  phone: {
    a: '1',
    b: '2'
  }
}

/**
 * extends
 */
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
