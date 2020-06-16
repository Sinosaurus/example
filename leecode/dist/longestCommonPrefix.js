function longestCommonPrefix(attStr) {
    if (!attStr.length)
        return '';
    var prefix = attStr[0];
    for (var i = 1; i < attStr.length; i++) {
        while (attStr[i].indexOf(prefix) != 0) {
            prefix = prefix.substring(0, prefix.length - 1);
            if (!prefix)
                return '';
        }
    }
    return prefix;
}
var attStr = [
    'leecode',
    'leeabcd',
    'leeoaoa',
    'l'
];
var res = longestCommonPrefix(attStr);
console.log(res);
