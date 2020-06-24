export function otherInterface () {
  // 函数类型接口
  interface InSum {
    (a:number, b:number):number
  }
  const sum:InSum = (a:number, b:number):number => a + b
  

  // 类 类型接口

  interface InPeople {
    name: string,
    age: number,
    eat():void
  }
  // implements 需要 XM 强行符合 InPeople 这个要求
  class XM implements InPeople {
    name: string = '小明'
    age:number = 18
    eat () {}
  }

  // 使用这些主要目的是为了规则，让大家都遵守这一约定，可以避免后期的一些细节问题，比如漏掉或者其他的
}