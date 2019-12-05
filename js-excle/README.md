# [js-xlsx](https://github.com/SheetJS/js-xlsx) 使用

## 介绍

### 概念
+ **workbook 对象**，指的是整份 Excel 文档。我们在使用 js-xlsx 读取 Excel 文档之后就会获得 workbook 对象。
+ **worksheet 对象**，指的是 Excel 文档中的表。我们知道一份 Excel 文档中可以包含很多张表，而每张表对应的就是 worksheet 对象。
+ **cell 对象**，指的就是 worksheet 中的单元格，一个单元格就是一个 cell 对象。


### 用法
+ 用 `XLSX.read` 读取获取到的 `Excel` 数据，返回 `workbook`
+ 用 `XLSX.readFile` 打开 `Excel` 文件，返回 `workbook`
+ 用 `workbook.SheetNames` 获取表名
+ 用 `workbook.Sheets[xxx]` 通过表名获取表格
+ 用 `worksheet[address]` 操作单元格
+ 用`XLSX.utils.sheet_to_json`针对单个表获取表格数据转换为`json`格式
+ 用`XLSX.writeFile(wb, 'output.xlsx')`生成新的 `Excel` 文件


### 参考链接
+ [凹凸](https://aotu.io/notes/2016/04/07/node-excel/index.html)
+ [掘金](https://juejin.im/entry/5c0ba46af265da615f7717b4)
+ [segmentfault](https://segmentfault.com/a/1190000018077543)