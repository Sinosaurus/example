"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
function interFace() {
    // 接口 可以理解为一个规范 一个约定
    function ajax(options) { }
    ajax({
        url: '/baidu.com',
        data: { id: 1 },
        success(response) { }
    });
    const point = {
        x: 100,
        y: 100
    };
    // point.x = 200
    point.y = 150;
    const point1 = {
        x: 200,
        y: 150,
        // 额外新增的属性
        z: 200,
        a: 150
    };
}
exports.interFace = interFace;
