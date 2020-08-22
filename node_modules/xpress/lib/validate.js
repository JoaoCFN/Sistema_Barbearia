/**
 * Created by synder on 16/6/21.
 */

exports.isNull = function (val) {
    return val === null;
};

exports.isUndefined = function (val) {
    return val === undefined;
};

exports.isNullOrUndefined = function (val) {
    return val == null;
};

exports.isDate = function (val) {
    return val.constructor === Date;
};

exports.isArray = function (val) {
    return Array.isArray(val);
};

exports.isString = function (val) {
    return typeof val === 'string';
};

exports.isNumber = function (val) {
    return typeof val === 'number';
};

exports.isFunction = function(v){
    return typeof v === 'function';
};

exports.isNaN = function (val) {
    return isNaN(val);
};

exports.isRegExp = function(v){
    return v.constructor === RegExp;
};

exports.isBool = function (val) {
    return typeof val === 'boolean';
};

exports.isInt = function (val) {
    return typeof val === 'number' && ((val | 0) === val);
};

exports.isFloat = function (val) {
    return typeof val === 'number' && !((val | 0) === val);
};

exports.isObject = function (obj) {
    return obj !== null && typeof obj === 'object';
};

exports.isDictionary = function (obj) {
    return obj !== null && !Array.isArray(obj) && typeof obj === 'object';
};

exports.isBuffer = function (obj) {
    return Buffer.isBuffer(obj);
};

exports.isSymbol = function (arg) {
    return typeof arg === 'symbol';
};

exports.isRequired = function (obj) {
    return !!obj;
};

exports.isMobile = function (str) {

    if(str && str.length !== 11){
        return false;
    }

    if(str.charCodeAt(0) !== 49){
        return false;
    }

    var temp = 0;

    for(var i = 1; i < str.length; i++){
        temp = str.charCodeAt(i);
        if(!(temp > 47 && temp < 58)){
            return false;
        }
    }

    return true;
};

exports.isEmail = function (str) {
    return /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(str);
};

exports.isPassword = function (pass, min, max) {
    pass = pass + '';
    min = min || 6;
    max = max || 20;

    var len = pass.length;

    if(len < min){
        return 0;
    }

    if(len > max){
        return 0;
    }

    var temp = 0;
    var hasNumber = false;
    var hasUpperAlpha = false;
    var hasLowerAlpha = false;
    var hasSpecialChars = false;

    for(var i = 0; i < len; i++){
        temp = pass.charCodeAt(i);
        if(!(temp > 31 && temp < 127)){
            return 0;
        }

        if(temp > 47 && temp < 58){
            hasNumber = true;
        }else if(temp > 64 && temp < 91){
            hasUpperAlpha = true;
        }else if(temp > 96 && temp < 123){
            hasLowerAlpha = true;
        }else{
            hasSpecialChars = true;
        }
    }

    var count = 0;

    if(hasNumber){
        count++;
    }
    if(hasUpperAlpha){
        count++;
    }
    if(hasLowerAlpha){
        count++;
    }
    if(hasSpecialChars){
        count++;
    }

    return count;
};

exports.isChinese = function (str) {
    return /^[\u4e00-\u9fa5]+$/.test(str);
};

exports.isBankCard = function (str) {
    str = str + '';

    var sum = 0;

    if(str.length < 15){
        return false;
    }

    for (var len = str.length, i = len - 1, j = 1; i > -1; i--, j++) {

        var temp = str.charCodeAt(i) - 48;

        if (j % 2 === 0) {
            var x = temp * 2;
            sum += (x > 9 ? x - 9 : x);
        } else {
            sum += temp;
        }
    }

    return sum % 10 === 0;
};

exports.isChineseIdCard = function (str) {
    var numberLength = str.length;

    if (numberLength !== 18) {
        return false;
    }

    var factor = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
    var mapping = [49, 48, 88, 57, 56, 55, 54, 53, 52, 51, 50];
    var sum = 0;
    var check = str.charCodeAt(numberLength - 1);

    if (check > 88) {
        check = check - 32;
    }

    for (var len = factor.length, i = 0; i < len; i++) {
        var temp = str.charCodeAt(i) - 48;
        if (temp > -1 && temp < 10) {
            sum += factor[i] * temp;
        } else {
            return false;
        }
    }

    return mapping[sum % 11] === check;
};

exports.isIPV4Address = function (str) {
    if(str.length < 7){
        return false;
    }

    var temp = str.split('.');

    if(temp.length != 4){
        return false;
    }

    for(var i = 0 ; i < temp.length; i++){
        if(parseInt(temp[i]) > 255){
            return false;
        }
    }

    return true;
};

exports.isIPV6Address = function (str) {
    
};