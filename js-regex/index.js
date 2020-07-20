// https://regex101.com/r/fBXyX0/1
// https://regexper.com/
// https://juejin.im/post/5c6d18e56fb9a04a0a5fc4bf
// https://regexone.com/lesson/misc_meta_characters?
/**
 *  \w [a-zA-Z0-9]
    \W [^a-zA-Z0-9]
    \s 空格
    \S 非空
    \d [0-9]
    \D [^0-9]
    . 除了换行符，终止符之外的
    \b 单词的边界 \w和\W之间的边界
    |B 非单词边界
 */
const log = console.log
let num = 123445
let str = `abdc`
let strUpper = `ABC`
let any = `a12A`

log(/\w/.test(num))
log(/\d/.test(num))
log(/\W/.test(num))
log(/\s/.test(num))
log(/\S/.test(num))
log(/\b/.test('a%fdas'))

/**
 * {n, m}  n <= matches < m
 * {n,} matches >= n
 * {n} matches === n
 * ? {0,1}
 * + {1,}
 * * {0,}
 */

/**
 * 贪婪
 * 非贪婪
 */

 let tx = `wooshiyige`
log(tx.match(/o+/g))
// 非贪婪
log(tx.match(/o+?/g))


/**
 * | 或
 * () \1 表示取第一个括弧内容 \2 \3...
 */
let regRE = /["'][^'"]*["']/g
// 转为
regRE = /(["'][^'"]*\1)/g

/**
 * (?:) 单纯分组，不记住该组合匹配的字符串
 * （？） 将分组以 那么 命名
 */

console.log(`1234566`.match(/\d{1,3}/g))

// 数字与子母

let azNum = /\d(?=[a-z])|[a-z](?=\d)/g
let rrr = `aa44ds55gg77`.replace(azNum, '$&@')
console.log(rrr)