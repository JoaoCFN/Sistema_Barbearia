/**
 * Created by synder on 16/6/20.
 */

var url = require('url');

exports.parseTime = function (date) {
    date = new Date(date);

    if(!date){
        return null;
    }

    return {
        hour : date.getHours(),
        minute: date.getMinutes(),
        second : date.getSeconds() + 1
    };
};

exports.parseDate = function (date) {
    date = new Date(date);

    if(!date){
        return null;
    }

    return {
        year : date.getFullYear(),
        month: date.getMonth() + 1,
        day : date.getDate()
    };
};

exports.parseDateTime = function (date) {
    date = new Date(date);

    if(!date){
        return null;
    }

    return {
        year : date.getFullYear(),
        month: date.getMonth() + 1,
        day : date.getDate(),
        hour : date.getHours(),
        minute: date.getMinutes(),
        second : date.getSeconds() + 1
    };
};

exports.parseInt = function (num, dft) {
    if(dft == 0){
        return parseInt(num) || dft;
    }else{
        return parseInt(num) || dft || null;
    }
};

exports.parseFloat = function (num, dft) {
    if(dft == 0){
        return parseFloat(num) || dft;
    }else{
        return parseFloat(num) || dft || null;
    }
};

exports.parseNumber = function (num, dft) {
    if(dft == 0){
        return parseFloat(num) || dft;
    }else{
        return parseFloat(num) || dft || null;
    }
};

exports.parseBool = function (obj) {
    return !!obj;
};

exports.parseUrl = url.parse;

exports.parseJson = function (str, dft) {
    var res = dft || null;

    try{
        res = JSON.parse(str);
    }catch (ex){
        console.warn(ex.stack);
    }

    return res;
};