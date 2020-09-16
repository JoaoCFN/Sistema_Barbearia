/**
 * Created by synder on 16/5/31.
 */

exports.date = function (date, dateJoin) {
    date = new Date(date);
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();

    month = month < 10 ? '0' + month : month;
    day = day < 10 ? '0' + day : day;

    if (!dateJoin) {
        return year + '年' + month + '月' + day + '日';
    } else {
        return year + dateJoin + month + dateJoin + day;
    }
};

exports.time = function (date, timeJoin) {
    date = new Date(date);
    var hour = date.getHours();
    var minute = date.getMinutes();
    var second = date.getSeconds() + 1;

    hour = hour < 10 ? '0' + hour : hour;
    minute = minute < 10 ? '0' + minute : minute;
    second = second < 10 ? '0' + second : second;

    if (!timeJoin) {
        return hour + '时' + minute + '分' + second + '秒';
    } else {
        return hour + timeJoin + minute + timeJoin + second;
    }
};

exports.dateTime = function (date, dateJoin, timeJoin) {
    date = new Date(date);
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hour = date.getHours();
    var minute = date.getMinutes();
    var second = date.getSeconds() + 1;

    month = month < 10 ? '0' + month : month;
    day = day < 10 ? '0' + day : day;
    hour = hour < 10 ? '0' + hour : hour;
    minute = minute < 10 ? '0' + minute : minute;
    second = second < 10 ? '0' + second : second;

    var dateTemp = '';
    if (!dateJoin) {
        dateTemp = year + '年' + month + '月' + day + '日';
    } else {
        dateTemp = year + dateJoin + month + dateJoin + day;
    }

    var timeTemp = '';
    if (!timeJoin) {
        timeTemp = hour + '时' + minute + '分' + second + '秒';
    } else {
        timeTemp = hour + timeJoin + minute + timeJoin + second;
    }

    return dateTemp + ' ' + timeTemp;
};

exports.format = function format(fmt) {
    var argIndex = 1,
        args = [].slice.call(arguments),
        i = 0,
        n = fmt.length,
        result = '',
        c,
        escaped = false,
        arg,
        tmp,
        leadingZero = false,
        precision,
        nextArg = function() { return args[argIndex++]; },
        slurpNumber = function() {
            var digits = '';
            var temp = fmt.charCodeAt(i);
            while ( temp > 47 && temp < 58) {
                digits += fmt[i++];
                c = fmt[i];
            }
            return digits.length > 0 ? parseInt(digits) : null;
        };

    for (; i < n; ++i) {
        c = fmt[i];
        if (escaped) {
            escaped = false;
            if (c == '.') {
                leadingZero = false;
                c = fmt[++i];
            }
            else if (c == '0' && fmt[i + 1] == '.') {
                leadingZero = true;
                i += 2;
                c = fmt[i];
            }
            else {
                leadingZero = true;
            }
            precision = slurpNumber();
            switch (c) {
                case 'b': // number in binary
                    result += parseInt(nextArg(), 10).toString(2);
                    break;
                case 'c': // character
                    arg = nextArg();
                    if (typeof arg === 'string' || arg instanceof String)
                        result += arg;
                    else
                        result += String.fromCharCode(parseInt(arg, 10));
                    break;
                case 'd': // number in decimal
                    result += parseInt(nextArg(), 10);
                    break;
                case 'f': // floating point number
                    tmp = String(parseFloat(nextArg()).toFixed(precision || 6));
                    result += leadingZero ? tmp : tmp.replace(/^0/, '');
                    break;
                case 'j': // JSON
                    result += JSON.stringify(nextArg());
                    break;
                case 'o': // number in octal
                    result += '0' + parseInt(nextArg(), 10).toString(8);
                    break;
                case 's': // string
                    result += nextArg();
                    break;
                case 'x': // lowercase hexadecimal
                    result += '0x' + parseInt(nextArg(), 10).toString(16);
                    break;
                case 'X': // uppercase hexadecimal
                    result += '0x' + parseInt(nextArg(), 10).toString(16).toUpperCase();
                    break;
                default:
                    result += c;
                    break;
            }
        } else if (c === '%') {
            escaped = true;
        } else {
            result += c;
        }
    }
    return result;
};

exports.pad = function pad(str, length, padStr, direction) {
    str = (str == null) ? '' : str + '';

    length = ~~length;

    var padLen = 0;

    if (!padStr){
        padStr = ' ';
    } else if (padStr.length > 1){
        padStr = padStr.charAt(0);
    }

    var strRepeat = function (str, times) {
        if (times < 1) return '';
        var result = '';
        while (times > 0) {
            if (times & 1) {
                result += str;
            }
            times >>= 1;
            str += str;
        }
        return result;
    };

    switch (direction) {
        case 'right':
            padLen = length - str.length;
            return str + strRepeat(padStr, padLen);
        case 'both':
            padLen = length - str.length;
            return strRepeat(padStr, Math.ceil(padLen / 2)) + str + strRepeat(padStr, Math.floor(padLen / 2));
        default:
            padLen = length - str.length;
            return strRepeat(padStr, padLen) + str;
    }
};

exports.unit = function (str, unit, defaults) {
    if(!str){
        return defaults ? defaults : '';
    }else{
        return str + '' + unit;
    }
};

exports.mask = function (str, mask, start, len) {

    if(!str){
        return '';
    }else{
        str = str + '';
    }

    if(!mask){
        return '';
    }else{
        mask = mask + '';
    }

    var res = '';
    var end = 0;

    if(start < 0){
        end = start + str.length;
        start = end < len ? 0 : end - len;
    }else{
        start = start - 1;
        end = start + len - 1;
    }

    for(var i = 0; i < str.length; i++){
        if(i < start || i > end){
            res += str[i];
        }else{
            res += mask;
        }
    }

    return res;
};

exports.join = function () {
    if (arguments.length === 0) {
        return '';
    }

    if (arguments.length === 1) {
        return (arguments[0] == null) ? '' : arguments[0] + '';
    }

    var joiner = arguments[arguments.length - 1];

    var temp = [];

    for (var i = 0, len = arguments.length - 1; i < len; i++) {

        arguments[i] = (arguments[i] == null) ? '' : arguments[i] + '';

        if(!arguments[i]){
            continue;
        }

        temp.push(arguments[i]);
    }

    return temp.join(joiner);
};

exports.trim = function (str) {
    str = (str == null) ? '' : str + '';
    return str.trim();
};

exports.quote = function (str, quoteChar) {
    quoteChar = quoteChar || '"';
    return [quoteChar, str, quoteChar].join('');
};

exports.clean = function (str) {
    str = (str == null) ? '' : str + '';
    return str.trim().replace(/\s\s+/g, ' ');
};

exports.lines = function (str) {
    str = (str == null) ? '' : str + '';

    if (!str) {
        return [];
    }

    return str.split(/\r\n?/);
};

exports.splicing = function (str, ext) {
    str = (str == null) ? '' : str + '';

    if(!str){
        return '';
    }

    return str + ext;
};

exports.signed = function (number) {
    number = parseFloat(number);

    if(number > 0){
        return '+' + number;
    }else if(number < 0){
        return '-' + number;
    }else{
        return number + '';
    }
};

exports.stringify = function (content) {
    if(content == null){
        return '';
    }

    if(content.constructor === Date){
        return content + '';
    }

    if(content.constructor === RegExp){
        return content + '';
    }

    if(Array.isArray(content)){
        return '[' + content.join(',') + ']';
    }

    if(typeof content === 'object'){
        return JSON.stringify(content);
    }

    return content + '';
};

exports.truncate = function (str, length, ellipsis) {
    str = (str == null) ? '' : str + '';
    ellipsis = (ellipsis == null) ? '' : ellipsis + '';

    var res = str.slice(0, length - ellipsis.length);
    if (ellipsis) {
        res += ellipsis;
    }
    return res;
};

exports.capitalize = function (str, lowercaseRest) {
    str = (str == null) ? '' : str + '';
    var remainingChars = !lowercaseRest ? str.slice(1) : str.slice(1).toLowerCase();
    return str.charAt(0).toUpperCase() + remainingChars;
};

exports.upperCase = function (str) {
    str = (str == null) ? '' : str + '';
    return str.toUpperCase();
};

exports.lowerCase = function (str) {
    str = (str == null) ? '' : str + '';
    return str.toLowerCase();
};

exports.currency = function (money, unit, n) {
    n = n || 2;
    unit = unit || '';
    money = parseFloat(money) || 0;
    money = money.toFixed(n);
    money = money + '';

    var temp = money.split('.');
    var decimal = temp.length > 1 ? temp[1] : '';
    var integer = temp[0];
    var result = '';

    while (integer.length > 3) {
        result = ',' + integer.slice(-3) + result;
        integer = integer.slice(0, integer.length - 3);
    }
    if (integer) {
        result = integer + result;
    }

    if (decimal) {
        result = result + '.' + decimal;
    }

    return unit + result;
};

exports.chineseCurrency = function (money) {

    var number = String(money);

    number = number.split('.')[0];

    const NUM = ["零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "扒", "玖", "拾"],
        BASE_UNIT = ["", "拾", "佰", "仟"],
        ADVANCE_UNIT = ["", "萬", "亿", "兆"];

    var last = number.length % 4;

    var temp = [];

    for(var i = 0; i < number.length; i++){

        var index = 0;

        if(last > 0){
            index = Math.floor((i + (4 - last)) / 4);
        }else{
            index = Math.floor(i / 4);
        }

        if(!temp[index]){
            temp[index] = [];
        }

        if(index == 0){
            if(temp[index].length == 0){
                if(number[i] != '0'){
                    temp[index].push(NUM[number[i]]);
                }
            }else{
                temp[index].push(NUM[number[i]]);
            }
        }else{
            temp[index].push(NUM[number[i]]);
        }

    }

    var result = '';

    while (temp[0].length == 0){
        temp = temp.slice(1);
    }

    for(var j = 0; j < temp.length; j++){
        for(var k = 0, len = temp[j].length; k < len; k++){
            temp[j][k] = temp[j][k] == NUM[0] ? temp[j][k] : temp[j][k] + BASE_UNIT[len - k - 1];
            if(k == 3 && temp[j][k] == NUM[0]){
                temp[j][k] = '';
            }
        }

        result += temp[j].join('') + ADVANCE_UNIT[temp.length - j - 1];
    }

    result = result.replace(/零{3}萬/g, '');
    result = result.replace(/零{3}亿/g, '');
    result = result.replace(/零{3}兆/g, '');
    result = result.replace(/零{1,2}萬/g, '萬');
    result = result.replace(/零{1,2}亿/g, '亿');
    result = result.replace(/零{1,2}兆/g, '兆');
    result = result.replace(/零+/g, '零');
    result = result.replace(/零$/g, '');

    return result;
};

exports.thousands = function (money, n) {
    
    money = parseFloat(money) || 0;

    if(n){
        money = money.toFixed(n);
    }

    money = money + '';

    var temp = money.split('.');
    var decimal = temp.length > 1 ? temp[1] : '';
    var integer = temp[0];
    var result = '';

    while (integer.length > 3) {
        result = ',' + integer.slice(-3) + result;
        integer = integer.slice(0, integer.length - 3);
    }
    if (integer) {
        result = integer + result;
    }

    if (decimal) {
        result = result + '.' + decimal;
    }

    return result;
};

exports.bankCard = function (card) {

    card = card + '';

    var result = '';

    while (card.length > 4) {
        result = result + card.slice(0, 4) + ' ';
        card = card.substr(4);
    }

    if (card) {
        result += card;
    }

    return result;
};

exports.percentage = function (number, n) {

    if (typeof number !== 'number') {
        number = parseFloat(number) || 0;
    }

    number = number * 100;

    if (n) {
        number = number.toFixed(n);
    }

    return number + '%';
};

exports.number = function (number, fraction) {

    if(fraction == null){
        return number;
    }

    fraction = parseInt(fraction) || 0;

    if (typeof number !== 'number') {
        number = parseFloat(number) || 0;
    }

    return number.toFixed(fraction);
};
