export function interFace ():void {
  // 接口 可以理解为一个规范 一个约定

  interface AjaxOptions {
    url: string,
    // ? 可选属性
    type?: string,
    data?: object,
    // function
    success (response: object):void
  }
  function ajax (options: AjaxOptions) {}

  ajax({
    url: '/baidu.com',
    data: { id: 1 },
    success (response) {}
  })

  // readonly

  interface Point {
    readonly x: number,
    y: number,
    // 额外的属性检查，可以新增属性
    [propName: string]: any
  }

  const point:Point = {
    x: 100,
    y: 100
  }

  // point.x = 200
  point.y = 150

  const point1: Point = {
    x: 200,
    y: 150,
    // 额外新增的属性
    z: 200,
    a: 150
  }
}