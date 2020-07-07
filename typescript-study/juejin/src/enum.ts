/*
 * @LastEditors: Sinosaurus
 */ 
function greeter(person:string) {
  return 'hello'
}

enum Month {
  January,
  February,
  March,
  April,
  May,
  June,
  July,
  August,
  September,
  October,
  November,
  December
}

function isSummer(month: Month) {
  switch (month) {
    case Month.June:
    case Month.July:
    case Month.August:
      return true
    default:
      return false
  }
}

console.log(isSummer(Month.June))

// 命名空间
namespace NMonth {
  // export 必须填写
  export function isSummer(month: Month) {
    switch (month) {
      case Month.June:
      case Month.July:
      case Month.August:
        return true
      default:
        return false
    }
  }
}
console.log(NMonth.isSummer(Month.June), 'namespace')
