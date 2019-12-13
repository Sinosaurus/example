

## 使用技巧
+ [TypeSearch](https://microsoft.github.io/TypeSearch/)
  > 可以用来对一些用js写的库的支持，便于在ts中，有对应的提示及类型检测
+ [ts-options](https://www.tslang.cn/docs/handbook/compiler-options.html)  

+ `strictNullChecks: true` 在`tsconfig.json`添加该配置，可以用于更好地提示
  
  ```ts
    // ele 有可能是 element/null
    const ele = document.getElementById('box')
    /**
     * 此时有可能会因为 ele=null 而报错，通过添加 `strictNullChecks: true`
     * 可以在ele.value便有提示，从而进行处理
    */
   ele.value = 1 
  ```  