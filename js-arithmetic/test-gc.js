/*
 * @LastEditors: Sinosaurus
 */
const startBtn = document.getElementById('btn')
// startBtn.addEventListener("click", function () {
//   var a = new Array(100000).fill(1);
//   var b = new Array(20000).fill(1);
// });

var x = [];
function grow() {
  x.push(new Array(1000000).join('x'));
}
startBtn.addEventListener('click', grow);