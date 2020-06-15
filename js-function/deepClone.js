function deepCopy(target, cache = new Set()) {
  // 注意环引用
  if (
    (typeof target !== 'object' && target !== null) ||
    cache.has(target)
  ) {
    return target
  }
  if (Array.isArray(target)) {
    return target.map(t => {
      cache.add(t)
      return t
    })
  } else {
    // 注意symbol key
    return [...Object.keys(target), ...Object.getOwnPropertySymbols(target)].reduce((res, key) => {
      cache.add(target[key])
      res[key] = deepCopy(target[key], cache)
      return res
    }, target.constructor !== Object ? Object.create(target.constructor.prototype) : {}) // 继承
  }
}

// https://stackoverflow.com/questions/4459928/how-to-deep-clone-in-javascript
function clone(item) {
  if (!item) return item // null, undefined values check
  const types = [Number, String, Boolean]
  let result // default value undefined

  // normalizing primitives if someone did new String('aaa'), or new Number('444');
  types.forEach(function (type) {
    if (item instanceof type) {
      result = type(item);
    }
  });

  if (typeof result === "undefined") {
    if (Object.prototype.toString.call(item) === "[object Array]") {
      result = [];
      item.forEach(function (child, index, array) {
        result[index] = clone(child);
      });
    } else if (typeof item ===  "object") {
      // testing that this is DOM
      if (item.nodeType && typeof item.cloneNode == "function") {
        result = item.cloneNode(true);
      } else if (!item.prototype) { // check that this is a literal
        if (item instanceof Date) {
          result = new Date(item);
        } else {
          // it is an object literal
          result = {};
          for (var i in item) {
            result[i] = clone(item[i]);
          }
        }
      } else {
        // depending what you would like here,
        // just keep the reference, or create new object
        if (false && item.constructor) {
          // would not advice to do that, reason? Read below
          result = new item.constructor();
        } else {
          result = item;
        }
      }
    } else {
      result = item;
    }
  }
  return result;
}

// https://juejin.im/post/5c6b859e6fb9a04a06056f22
function deepClone (obj) {  
  if (typeof obj !== 'object' ||  obj === null) return obj
  let newObj = obj instanceof Array ? [] : {}  
  for (let key in obj) {    
     if (typeof obj[key] === 'object') {      
       newObj[key] = deepClone(obj[key])    
     } else {      
        newObj[key] = obj[key]    
     }  
   }
   return newObj
}
