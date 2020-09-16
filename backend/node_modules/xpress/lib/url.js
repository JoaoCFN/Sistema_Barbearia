/**
 * Created by synder on 16/6/20.
 */

var url = require('url');

exports.urlPathVersion = function (path, version) {
    return path + '?v=' + version;
};

exports.urlPathJoin = function (args) {
    if (arguments.length === 0) {
        return '.';
    }

    var joined;

    for (var i = 0; i < arguments.length; ++i) {

        if(!arguments[i]){
            continue;
        }

        var arg = encodeURIComponent(arguments[i]);

        if (arg.length > 0) {
            if (joined == null){
                joined = arg;
            } else{
                joined += '/' + arg;
            }
        }
    }
    if (joined === undefined){
        return '';
    }
    return '/' + joined;
};

exports.urlFormat = function (pathname, query, protocol, hostname, port, hash) {
    return url.format({
        protocol: protocol,
        port: port,
        hostname: hostname,
        query: query,
        pathname: pathname,
        hash: hash
    });
};

exports.urlResolve = url.resolve;

exports.urlParse = url.parse;