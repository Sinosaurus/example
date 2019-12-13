function test1 (bool: boolean): boolean {
  console.log('test1')
  return bool
}

function test2 (bool: boolean): boolean {
  console.log('test1')
  return bool
}
console.log('使用 &&')
if (test1(true) && test2(true)) {
  console.log(1)
} else {
  console.log(2, '\n')
}
console.log('使用 ||')
if (test1(true) || test2(false)) {
  console.log(1)
} else {
  console.log(2)
}

const str1: string = `
  通过上述实验，目前在使用 && 时，
  前一个通过才会执行下一个判断条件，
  而不是全部都执行
`
console.log(str1)