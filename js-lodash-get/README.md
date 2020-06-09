# 测试lodash get问题

由于某些情况，本地使用 get 方法可以，但是上到测试就出问题，因而进行排查一下原因

目前看了源码，源码没有问题，因而我开始排查其他方面，发现自己很久前引入了一个 lodash-webpack-plugin 这个包，因为开发环境不经过这个，所以本地没事，测试及正式有问题

> 感觉是用法有问题 【目前的猜测】
使用 `lodash-webpack-plugin` 时，可能需要使用 `import { get } from lodash`
不使用时，可以通过 `import get from lodash/get`