/**
 * Created by synder on 16/4/23.
 */
const colors = require('colors');
var METHODS = require('./method');

const logger = console.log;

/**
 * @desc show warn info
 * */
const warn = function (option) {
    if(option.v === 0){
        throw new Error('version can not set to 0');
    }

    if(option.c === 0){
        throw new Error('channel can not set to 0');
    }
};

/***
 * @desc wraper http method on Xpress instance
 */
const wraper = function (option, handler, trace) {
    return function (req, res, next) {

        if (option.v) {
            if (req.version != option.v) {
                if(trace){
                    logger(colors.yellow('SKIP ROUTE: %s {v:%s, c:%s} %s'), req.method, option.v, option.c, req.route.path);
                }
                return next();
            }
        }

        if (option.c) {
            if (req.channel != option.c) {
                if(trace){
                    logger(colors.yellow('SKIP ROUTE: %s {v:%s, c:%s} %s'), req.method, option.v, option.c, req.route.path);
                }
                return next();
            }
        }

        if(trace){
            logger(colors.green('MATCH ROUTE: %s {v:%s, c:%s} %s'), req.method, option.v, option.c, req.route.path);
        }

        handler(req, res, next);
    };
};


exports.method = function (Prototype, instance, router, trace) {

    METHODS.push('all');

    /**
     * add http method
     * */
    METHODS.forEach(function (method) {

        /***
         * router.get(function(req, res, next){})
         * router.get({v:1, c:1}, function(req, res, next){});
         * router.get('/', function(req, res, next){});
         * router.get(/^name$/, function(req, res, next){});
         * router.get('/', {v:1, c:1}, function(req, res, next){});
         * */
        Prototype.prototype[method] = function () {

            if (typeof arguments[0] === 'function') {
                for (var x = 0; x < arguments.length; x++) {
                    router[method](arguments[x]);
                }
                return instance;
            }

            if (typeof arguments[1] === 'function') {
                if (!arguments[0].v && !arguments[0].c) {
                    for (var z = 1; z < arguments.length; z++) {
                        router[method](arguments[0], arguments[z]);
                    }
                } else {
                    warn(arguments[0]);
                    for (var y = 1; y < arguments.length; y++) {
                        router[method](wraper(arguments[0], arguments[y], trace));
                    }
                }
                return instance;
            }

            if (typeof arguments[1] === 'object') {

                warn(arguments[1]);

                for (var i = 2; i < arguments.length; i++) {
                    if (typeof arguments[i]) {
                        router[method](arguments[0], wraper(arguments[1], arguments[i], trace));
                    }
                }

                return instance;
            }

            throw new Error('param error');
        };

    });
};
