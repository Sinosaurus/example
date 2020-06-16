function longestCommonPrefix (attStr: Array<string>):string {
  if (!attStr.length) return ''
  let prefix: string = attStr[0]
  for (let i = 1; i < attStr.length; i ++) {
    while(attStr[i].indexOf(prefix) != 0) {
      prefix = prefix.substring(0, prefix.length - 1)
      if (!prefix) return ''
    }
  }
  return prefix
}

const attStr = [
  'leecode',
  'leeabcd',
  'leeoaoa',
  'l'
]

const res = longestCommonPrefix(attStr)
console.log(res)