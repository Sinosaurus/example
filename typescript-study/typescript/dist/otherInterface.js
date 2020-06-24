"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
function otherInterface() {
    const sum = (a, b) => a + b;
    // implements 需要 XM 强行符合 InPeople 这个要求
    class XM {
        constructor() {
            this.name = '小明';
            this.age = 18;
        }
        eat() { }
    }
    // 使用这些主要目的是为了规则，让大家都遵守这一约定，可以避免后期的一些细节问题，比如漏掉或者其他的
}
exports.otherInterface = otherInterface;
