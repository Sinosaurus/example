const Model = (function () {
  let instance = null
  return function createModel() {
    if (!instance) {
      instance = document.createElement('div')
      instance.innerText = `你还未登录...`
      instance.id = 'model'
      instance.style.cssText = `
        position: fixed;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, .6);
        display: none;
      `
      document.body.appendChild(instance)
    }
    return instance
  }
})();

function openModel() {
  const model = new Model()
  model.style.display = 'block'
}

class OpenModelByButton {
  onClick() {
    openModel()
  }
}
// 装饰器
class Decorator {
  constructor(button) {
    this.button = button
  }
  onClick() {
    this.button.onClick()
    this.changeButtonStatus()
  }
  changeButtonStatus() {
    this.changeButtonText()
    this.disableButton()
  }
  disableButton() {
    const btn = document.getElementById('open')
    btn.setAttribute("disabled", true)
  }
  changeButtonText() {
    const btn = document.getElementById('open')
    btn.innerText = '快去登录'
  }
}