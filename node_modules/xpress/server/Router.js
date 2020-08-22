/**
 * Created by synder on 16/4/23.
 */
const express = require('express');
const route = require('./route');
const ExpressRouter = express.Router;

const Router = function (config) {
    this.__trace = config ? config.trace : false;
    this.router = new ExpressRouter(config);
    this.__init();
};

Router.prototype.__init = function () {
    route.method(Router, this, this.router, this.__trace);
};

module.exports = Router;

