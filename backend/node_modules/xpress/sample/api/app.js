/**
 * @author xpress
 * @date 16/1/10
 * @desc
 */

const Xpress = require('Xpress');

//--------------------------------------------------
const server = new Xpress({
    host: null,
    key: null,
    cert: null,
    trace: true,
    port: {
        http: 8003,
        https: null
    }
});

//--------------------------------------------------
server.conf('x-powered-by', false);
server.conf('trust proxy', true);


//--------------------------------------------------
const body = require('body-parser');

server.use(body.json());
server.use(body.urlencoded({extended: true}));

//--------------------------------------------------
const homeRouter = require('./route/home');

server.sub('/', homeRouter);

//---------------------------------------------------------
server.error(404, function (err, req, res, next) {
    res.status(404).json('not found');
});

server.error(500, function (err, req, res, next) {
    res.status(500).json(err.stack);
});

//--------------------------------------------------
server.listen(function(message){
    console.log(message);
});

//--------------------------------------------------
module.exports = server;
