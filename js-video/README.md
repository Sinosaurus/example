# video
如何做到自动播放

> 自动播放和声音

> Chrome's autoplay policies are simple:
+ Muted autoplay is always allowed. == 静音播放
+ Autoplay with sound is allowed if:
  - User has interacted with the domain (click, tap, etc.). == 单击，点击
  - On desktop, the user's Media Engagement Index threshold has been crossed, meaning the user has previously played video with sound. == 曾经播放过
  - The user has added the site to their home screen on mobile or installed the PWA on desktop.  == 主屏幕/PWA
+ Top frames can delegate autoplay permission to their iframes to allow autoplay with sound. == 使用Iframe

综上所述，最终结果只能选择 1/3
1.需要手动点击，对于一些已进入就播放的，就不可能实现了
2. iframe，这个目前可行，youtube就是如此操作的 [iframe](https://developers.google.com/web/updates/2017/09/autoplay-policy-changes#iframe)
3. 可否将视频跟音频分离，只是同步进行播放，这样视频可以进行静音自动播放，而音频是可以自动播放的，如此便可以进行关联了


+ [audio播放](https://cloud.tencent.com/developer/news/209779)

+ [AudioContext](https://developer.mozilla.org/zh-CN/docs/Web/API/AudioContext)
  - [demo](https://codepen.io/Rumyra/pen/qyMzqN/?__cf_chl_jschl_tk__=a8323470f7f57cac056d092df65482fb96b07ba1-1575883861-0-AYmecv7w0R1pMYusyly1nKAh_h2oHnDVRwJCIK_fAfn91RaU2RH8a1v2-olBkj6Im4-RhdxRxOjmN-KgaNfDE1NHbDwCmdYcyRGjU3GhRZ8Ii6tYeNIYFN2JrF-gvplj0sXADUvOy5PUH19CNo79MGxl-mL8mqUu3wZylaiNMyon05Qsy2FoQe7jD1JeYTutkKfLLXDMVoY9BB-vSdP9K8i8ga_hPEVxaMh8zuT-HKj_nehwJnW-UiiaKFDE76fJIsVwFwqgjA4_Sff5-lW_17tc7HDtcqAPPoFe6ZUU6dqcTcwnhRVYmNxG7P61-Fxm4ZaS6vXK9XpE5UPJblFvL-HHV5sh-wdTt_0eJE6IWuUe)