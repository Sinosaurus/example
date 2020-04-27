<!--
 * @LastEditors: Sinosaurus
 -->
# 使用 api 来读出博客内容

[link](https://jlelse.blog/dev/speech-synthesis/)

[jquery plugin](https://github.com/acoti/articulate.js)

[MDN](https://developer.mozilla.org/zh-CN/docs/Web/API/SpeechSynthesis)

[speech](https://wicg.github.io/speech-api/)

## 综上

+ 简单测试了，确实是可以利用浏览器自带的进行博客阅读。目前chrome还不行，应该是api没有调节好
   
  > 此处问题类似浏览器不让自动播放带声音的信息一样，需要人工允许触发



## bug

+ [getVoice() empty](https://stackoverflow.com/questions/49506716/speechsynthesis-getvoices-returns-empty-array-on-windows)
  
  > 需要延迟获取