/*
 * @LastEditors: Sinosaurus
 */ 
function test() {
  [arr, obj.children] = arr.reduce((res, val) => {
    if (filter(val)) {
      res[1].push(val)
    } else {
      res[0].push(val)
    }
    return res
  }, [[], []])
}
