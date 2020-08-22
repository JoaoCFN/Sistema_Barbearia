
var Xpress = require('../server/Xpress');

//--------------------------------------------------
var server = new Xpress({
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
var body = require('body-parser');

server.use(body.json());
server.use(body.urlencoded({extended: true}));
server.use(function(req, res, next){ next(); });


//--------------------------------------------------
server.get('/', {v:1.0, c: 'ios'}, function(req, res, next){
    res.json({
        users: []
    });
});

server.get('/', function(req, res, next){
    res.json({
        users: 'synder'
    });
});


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
