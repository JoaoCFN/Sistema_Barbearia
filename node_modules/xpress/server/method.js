/**
 * Created by synder on 16/4/23.
 */

const http = require('http');
var METHODS = [];

if (http.METHODS) {
    http.METHODS.forEach(function (method) {
        METHODS.push(method.toLowerCase());
    });
} else {
    METHODS = [
        'get',
        'post',
        'put',
        'head',
        'delete',
        'options',
        'trace',
        'copy',
        'lock',
        'mkcol',
        'move',
        'purge',
        'propfind',
        'proppatch',
        'unlock',
        'report',
        'mkactivity',
        'checkout',
        'merge',
        'm-search',
        'notify',
        'subscribe',
        'unsubscribe',
        'patch',
        'search',
        'connect'
    ];
}

module.exports = METHODS;