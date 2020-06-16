<!--
 * @LastEditors: Sinosaurus
 -->
# [mjml](https://github.com/mjmlio/mjml)

## options
| argument |	description |	default value |
| ---      | ---          |  ---          |  
| `mjml -m [input]` |	Migrates a v3 MJML file to the v4 syntax |	NA |
| `mjml [input] -o [output]`	|Writes the output to `[output]` |	NA |
| `mjml [input] -s` |	Writes the output to `stdout` |	NA |
| `mjml -w [input]`	| Watches the changes made to `[input]` (file or folder) |	NA |
| `mjml [input] --config.beautify` |	Beautifies the output (`true` or `false`)	| true |
| `mjml [input] --config.minify` |	Minifies the output (`true` or `false`)	| false |

> 更多配置见

+ [documentation](https://mjml.io/documentation/#validating-mjml)
+ [mjml-cli](https://github.com/mjmlio/mjml/blob/master/packages/mjml-cli/README.md)
+ [html-minifier](https://github.com/kangax/html-minifier)
+ [拖拽生成](https://www.mailjet.com/demo/)
+ [兼容性](https://mjml.io/faq#email-clients)

## 使用流程

+ 修改默认宽度 `width`

  - body

  ```html
    <mj-body width="800"></mj-body>
  ```

  - column: width `% | px`

  ```html
    <mj-column width="800px" ></mj-column>
    <mj-column width="10%" ></mj-column>
  ```

### 骨架 components

+ 多个组合起来的头部

  - 公司头部

    ```html
      <!-- Company Header -->
      <mj-section background-color="#f0f0f0">
        <mj-column>
          <mj-text  font-style="italic"
                    font-size="20px"
                    color="#626262">
            My Company
          </mj-text>
        </mj-column>
      </mj-section>
    ```

  - 图片头部

    ```html
      <mj-section background-url="http://1.bp.blogspot.com/-TPrfhxbYpDY/Uh3Refzk02I/AAAAAAAALw8/5sUJ0UUGYuw/s1600/New+York+in+The+1960's+-+70's+(2).jpg"
          background-size="cover"
          background-repeat="no-repeat">  
        <!-- 此处为了全屏，可以设置为 width="100%" -->
        <mj-column width="600px">
          <mj-text  align="center"
            color="#fff"
            font-size="40px"
            font-family="Helvetica Neue">Slogan here</mj-text>
          <mj-button background-color="#F63A4D"
              href="#">
            Promotion
          </mj-button>
        </mj-column>
      </mj-section>
    ```

+ 文字

  ```html
    <mj-text font-size="20px">我是内容</mj-text>
  ```

+ column 

  ```html
    <!-- Side image -->
    <mj-section background-color="white">
      <!-- Left image -->
      <mj-column>
        <mj-image width="200px" src="https://designspell.files.wordpress.com/2012/01/sciolino-paris-bw.jpg" />
      </mj-column>
      <!-- right paragraph -->
      <mj-column>
        <mj-text font-style="italic"
                font-size="20px"
                font-family="Helvetica Neue"
                color="#626262">
          Find amazing places
        </mj-text>
          <mj-text color="#525252">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum enim eget magna efficitur, eu semper augue semper. Aliquam erat volutpat. Cras id dui lectus. Vestibulum sed finibus lectus.
          </mj-text>
      </mj-column>
    </mj-section>
  ```

+ Icons

  ```html
    <!-- Icons -->
    <mj-section background-color="#fbfbfb">
      <mj-column>
        <mj-image width="100px" src="http://191n.mj.am/img/191n/3s/x0l.png" />
      </mj-column>
      <mj-column>
        <mj-image width="100px" src="http://191n.mj.am/img/191n/3s/x01.png" />
      </mj-column>
      <mj-column>
        <mj-image width="100px" src="http://191n.mj.am/img/191n/3s/x0s.png" />
      </mj-column>
    </mj-section>
  ```

+ Social Icons (社交图标)

  > 默认开启每个社交功能 也可以进行禁用  facebook: false

  ```html
    <mj-section background-color="#e7e7e7">
      <mj-column>
        <mj-social>
          <mj-social-element name="facebook" />
        </mj-social>
      </mj-column>
    </mj-section>
  ```
## other demo
+ [1](https://blog.csdn.net/weixin_34101229/article/details/89413902)


## 一些说明

鉴于目前mjml的一些高级功能无法在浏览器中复制到 邮件客户端，因而尝试从服务端发送是不是可以避开这个环境，从而实现这些效果

### node 发送邮件

[nodemailer](https://nodemailer.com/about/)

在这个过程中，我使用了qq邮箱作为主机

```js
  host: "smtp.qq.com",
  port: 465,
  secure: true, // true for 465, false for other ports
  auth: {
    user: '********@qq.com', // generated ethereal user
    // 密码不是qq登录密码，而是进入qq邮箱生成的秘钥
    pass: '************' // generated ethereal password
  }
```