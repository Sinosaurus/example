<!--
 * @LastEditors: Sinosaurus
--> 
# 原型

+ 属性不会去原型`__proto__`上查找查找，方法会通过原型进行查找

+ `Object.getPrototypeOf(obj) === obj.__proto__` 