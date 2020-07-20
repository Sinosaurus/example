/*
 * @LastEditors: Sinosaurus
 */
const fs = require('fs')
const json = require('./1.json')
const length = json.length
console.log(length)

function listToTree(data) {
  let arr = JSON.parse(JSON.stringify(data))
  const listChildren = (obj, filter) => {
    [arr, obj.children] = arr.reduce((res, val) => {
      if (filter(val))
        res[1].push(val)
      else
        res[0].push(val)
      return res
    }, [[], []])
    obj.children.forEach(val => {
      if (arr.length)
        listChildren(val, obj => obj.parentId === val.id)
    })
  }

  const tree = {}
  listChildren(tree, val => arr.findIndex(i => i.id === val.parentId) === -1)
  return tree.children
}

const r1 = listToTree(json)
fs.writeFileSync('./result2.json', JSON.stringify(r1, null, 4), 'utf-8')


function filterArray(data, parent) {
  var tree = [];
  var temp;
  for (var i = 0; i < data.length; i++) {
    var obj = data[i];
    if (obj.parentId == parent) {
      temp = filterArray(data, obj.id);
      if (temp.length > 0) {
        obj.children = temp;
      }
      tree.push(obj);
    }
  }
  return tree;
}


const rd = filterArray(json, '18-3')
console.log(rd.length)
fs.writeFileSync('./result1.json', JSON.stringify(rd, null, 4), 'utf-8')

const newArr = []
const ergodic = (arr) => {
  console.log(arr.length)
  arr.forEach((item) => {
    if (Array.isArray(item.children) && item.children.length) {
      ergodic(item.children);
    } else {
      newArr.push(item);
    }
  })
}
// ergodic(rd)
ergodic(r1)
console.log(newArr.length)
