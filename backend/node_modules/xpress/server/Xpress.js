/**
 * @desc Xpress class
 * @author synder
 * @version 2.0.11
 * */
const os = require('os');
const util = require('util');
const http = require('http');
const https = require('https');
const debug = require('debug');
const colors = require('colors');
const events = require('events');
const cluster = require('cluster');
const express = require('express');
const route = require('./route');
const Router = require('./Router');
const template = require('./template');
const EventEmitter = events.EventEmitter;

const logger = console.log;
/**
 * @desc create a Xpress instance
 * @constructor HttpServer
 * @this {Xpress}
 * @param {Object} options
 * {
 *      host : null,
 *      key : 'string',    //https private key
 *      cert : 'string',   //https cert
 *      port : {
 *          http  : 8000, //if need listen on http , you should provide this port number
 *          https : 4433  //if need listen on https , you should provide this port number
 *      }
 * }
 * */
var Xpress = function (options) {

    options = options || {};

    EventEmitter.call(this);

    var self = this;

    this.__host = options.host || null;

    this.__key = options.key;

    this.__cert = options.cert;

    this.__port = {
        http: options.port.http,
        https: options.port.https
    };

    this.__trace = options.trace || false;

    this.__defaultHeaders = {
        version: Xpress.defaults.versionHeader,
        channel: Xpress.defaults.channelHeader
    };

    //Have record registration error handler
    this.__errorHandler = {
        '404': function (req, res) {
            var err = new Error('resource not found:' + req.originalUrl);
            err.code = 404;
            if(self.__trace){
                logger(colors.red('NOT FOUND: %s {v:%s, c:%s} %s'), req.method, req.version, req.channel, req.originalUrl);
            }
            res.status(err.code).send('resource not found');
        },
        '500': function (err, req, res) {
            err.code = err.code || 500;
            if(self.__trace){
                console.error(err.stack);
            }
            res.status(err.code).send(err.message);
        }
    };

    this.httpServer = null;
    this.httpsServer = null;

    /**
     * if service started with cluster then all the worker processes will store there
     * */
    this.workers = null;

    /**
     * this property is the express application
     * */
    this.application = null;

    this.express = express;

    this.__init();

};

util.inherits(Xpress, EventEmitter);


/**
 * @desc
 * */
Xpress.defaults = {
    versionHeader: 'X-Accept-Version',
    channelHeader: 'X-Client-Channel'
};


/**
 * @desc template engine base on art-template
 * */
Xpress.engine = template.engine;


/**
 * @desc create server
 * */
Xpress.prototype.__server = function () {

    var self = this;

    self.application = express();

    if (self.__port.https) {
        if (!self.__key || !self.__cert) {
            throw new Error('listen https need key and cert');
        }
        self.httpsServer = https.createServer({
            key: self.__key,
            cert: self.__cert
        }, self.application);
    }

    if (self.__port.http) {
        self.httpServer = http.createServer(self.application);
    }
};

/**
 * @desc add version parser
 * */
Xpress.prototype.__parser = function () {
    var self = this;
    var versionHeader = self.__defaultHeaders.version.toLowerCase();
    var channelHeader = self.__defaultHeaders.channel.toLowerCase();
    self.application.use(function (req, res, next) {
        req.version = req.headers[versionHeader]; //get api version
        req.channel = req.headers[channelHeader]; //get api channel
        next();
    });

    if(self.__trace){
        self.application.use(function (req, res, next) {
            logger(colors.green('REQUEST URL: %s {v:%s, c:%s}  %s'), req.method, req.version, req.channel, req.originalUrl);
            next();
        });
    }
};

/**
 * @desc wraper http method
 * */
Xpress.prototype.__method = function () {
    route.method(Xpress, this, this.application, this.__trace);
};

/**
 * @desc init
 * @access private
 * */
Xpress.prototype.__init = function () {
    this.__server();
    this.__parser();
    this.__method();
};


/**
 * @desc set property on express
 * @example
 * httpServer.setting(function (app) {
 *   app.set('trust proxy', true);
 *   app.set('x-powered-by', false);
 * });
 * */
Xpress.prototype.conf = function () {
    this.application.set.apply(this.application, arguments);
};

/**
 * @desc set template engine on express
 * */
Xpress.prototype.engine = function () {
    this.application.engine.apply(this.application, arguments);
};

/**
 * @desc register middleware on express
 * @param [fn] {Function} function(req, res, next){}
 * @example
 * httpServer.use(function(app){
 *      app.use(compression());
 *      app.use(timeout('10s'));
 *      app.use(cookie());
 *      app.use(body.json());
 * });
 * */
Xpress.prototype.use = function (fn) {
    this.application.use.apply(this.application, arguments);
};


/**
 * @desc register a sub router
 * */
Xpress.prototype.sub = function (path, router) {
    if (arguments.length === 2) {
        if (!(arguments[1] instanceof Router)) {
            throw new Error('sub router must be a Xpress.Router instance');
        }
        this.application.use(arguments[0], arguments[1].router);
    } else if (arguments.length === 1) {
        if (!(arguments[0] instanceof Router)) {
            throw new Error('sub router must be a Xpress.Router instance');
        }
        this.application.use(arguments[0].router);
    } else {
        throw new Error('this function receive at most two params');
    }
};


/**
 * @desc add server error handle function
 * @param code {number} function(error, req, res, next){}
 * @param fn {Function} function(error, req, res, next){}
 * */
Xpress.prototype.error = function (code, fn) {

    if (arguments.length !== 2) {
        throw new Error('this function receive two params');
    }

    var self = this;

    if (code === 404) {
        this.__errorHandler[404] = function (req, res, next) {
            var err = new Error('resource not found:' + req.originalUrl);
            err.code = 404;
            if(self.__trace){
                logger(colors.red('NOT FOUND ROUTE: %s {v:%s, c:%s} %s'), req.method, req.version, req.channel, req.originalUrl);
            }
            fn(err, req, res, next);
        };
    } else {
        this.__errorHandler[500] = function (err, req, res, next) {
            err.code = err.code || 500;
            if(self.__trace){
                console.error(err.stack);
            }
            fn(err, req, res, next);
        };
    }
};


/**
 * @desc list on host and port
 * @param callback {Function} some message will send out
 * @example
 * httpServer.listen(8000, function(err, message){
 *      console.log(message);
 * })
 * */
Xpress.prototype.listen = function (callback) {

    var self = this;

    if (!self.__port.http && !self.__port.https) {
        throw new Error('port.http or port.https is not set');
    }

    //register a default error handler
    self.application.use(self.__errorHandler[404]);
    self.application.use(self.__errorHandler[500]);

    var listenMessage = '';
    var flag = 0;
    var count = 0;

    if (self.__port.http) {
        count++;
    }

    if (self.__port.https) {
        count++;
    }

    if (self.__port.http) {

        self.httpServer.listen(self.__port.http, self.__host, function (err) {

            flag++;

            if (err) {
                listenMessage += err.message;
            }

            var host = self.__host || '127.0.0.1';

            listenMessage += 'server listen on : http://' +
                host +
                ':' +
                self.__port.http +
                ', pid : ' +
                process.pid;

            if (flag >= count) {
                self.emit('listen', self.__port.http);
                callback && callback(listenMessage);
            }
        });

    }

    if (self.__port.https) {

        self.httpsServer.listen(self.__port.https, self.__host, function (err) {

            flag++;

            if (err) {
                listenMessage += err.message;
            }

            var host = self.__host || '127.0.0.1';

            listenMessage += '\nserver listen on : https://' +
                host +
                ':' +
                self.__port.https +
                ', pid : ' +
                process.pid;

            if (flag >= count) {
                self.emit('listen', self.__port.https);
                callback && callback(listenMessage);
            }

        });

    }
};


/**
 * @desc start service with cluster
 * @param num [Number] worker process count，null || 0, if < 0 then processCount == cpuCount - 1
 * @param cb [Number] some message will send out
 * @example
 *  //child process start event
 *  httpServer.on('childStart', function(worker){
 *       console.info(Date.now(), worker.pid);
 *  });
 *
 *
 *  //child process exit event
 *  httpServer.on('childStop', function(worker, code, signal){
 *      if(!signal && code !== 0){
 *          logger.fatal(Date.now(), worker.pid, code, signal);
 *      }
 *  });
 *
 *  //child process restart event
 *  httpServer.on('childRestart', function(worker){
 *      logger.fatal(Date.now(), worker.pid);
 *  });
 *
 *
 *  //a example start service with cluster
 *  httpServer.cluster(0, function (message) {
 *      console.log(message);
 *  });
 * */
Xpress.prototype.cluster = function (num, cb) {

    var self = this;
    var number = null;
    var callback = null;

    if (typeof arguments[0] === 'function') {
        number = os.cpus().length - 1;
        callback = arguments[0];
    } else {
        number = arguments[0] || os.cpus().length - 1;
    }

    self.workers = {};

    if (cluster.isMaster) {

        for (var i = 0; i < number; i++) {

            var workerProcess = cluster.fork();

            self.workers[workerProcess.process.pid] = workerProcess;

            self.emit('childStart', workerProcess);

        }

        cluster.on('exit', function (worker, code, signal) {

            self.emit('childStop', worker, code, signal);

            delete self.workers[worker.process.pid];

            setTimeout(function () {

                var workProcess = cluster.fork();

                self.workers[workProcess.process.pid] = workProcess;

                self.emit('childRestart', workProcess);

            }, 1000);

        });

    } else {
        self.listen(callback);
    }

};


module.exports = Xpress;