/*
 * @LastEditors: Sinosaurus
 */ 
const circle = document.getElementById('circle')
circle.addEventListener('click', function () {
  console.log('click')
  this.setAttribute('r', 40)
}, false)

const mySvg = document.getElementById('mySvg')
const svgString = (new XMLSerializer()).serializeToString(mySvg)
console.log(svgString)

// svg转为canvas
function createImage(svgString) {
  const img = new Image()
  const svg = new Blob([svgString], { type: 'image/svg+xml;charset=utf-8' })
  img.src = window.URL.createObjectURL(svg)
  img.onload = function () {
    const canvas = document.getElementById('canvas')
    const ctx = canvas.getContext('2d')
    ctx.drawImage(this, 0, 0)
    window.URL.revokeObjectURL(this.src)
  }
}
createImage(svgString)