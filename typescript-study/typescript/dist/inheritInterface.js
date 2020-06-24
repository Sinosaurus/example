"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
/*
 * @LastEditors: Sinosaurus
 */
function inheritInterface() {
    // 接口继承
    const threePoint = {
        z: 100,
        x: 100,
        y: 100
    };
    const people1 = {
        age: 10,
        name: '我是',
        eat() { }
    };
    // 接口继承类
    class Bird {
        constructor() {
            this.type = '画眉';
        }
        fly() { }
    }
    const bird = {
        type: '鸟',
        fly() { }
    };
}
exports.inheritInterface = inheritInterface;
