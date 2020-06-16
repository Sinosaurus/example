const order = ['demo1', 'demo2', 'demo3', 'demo4', 'demo5']

Page({

  data: {
    toView: 'green',
    scrollTop: 0
  },
  onShow () {
    console.log(1111)
    this.setData({
      scrollTop: 0
    })
  },
  upper(e) {
    console.log('upper', e, '顶部')
  },

  lower(e) {
    console.log('lower',e, '底部')
  },

  scroll(e) {
    console.log('scroll', e, '滚动')
     console.log(this.data.scrollTop)
  },

  scrollToTop() {
    console.log('scrollToTop')
    this.setAction({
      scrollTop: 0
    })
  },

  tap() {
    this.setData({
      scrollTop: 0
    })
  },

  tapMove() {
    this.setData({
      scrollTop: this.data.scrollTop + 10
    })
  }
})