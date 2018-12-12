var socket  = require('socket.io'),
    express = require('express'),
    https   = require('https'),
    http    = require('http'),
    logger  = require('winston');

logger.remove(logger.transports.Console);
logger.add(logger.transports.Console, {colorize: true, timestamp: true});

logger.info('SocketIO > listening on port ');

var app = express();
var http_server = http.createServer(app).listen(3001);

function emit(http_server) {
    var io = socket.listen(http_server);

    io.sockets.on('connection', function (http_server) {

    });
}

emit(http_server);