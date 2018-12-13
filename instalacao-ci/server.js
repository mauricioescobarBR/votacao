var socket  = require('socket.io'),
    express = require('express'),
    https   = require('https'),
    http    = require('http'),
    logger  = require('winston');

logger.remove(logger.transports.Console);
logger.add(logger.transports.Console, {colorize: true, timestamp: true});

logger.info('SocketIO > listening on port 3001');

var app = express();
var http_server = http.createServer(app).listen(3001);

function emit(http_server) {
    var io = socket.listen(http_server);

    io.sockets.on('connection', function (socket) {
        socket.on('encaminhamento', function (item_de_pauta) {

            io.emit('encaminhamento', item_de_pauta);
            console.log(item_de_pauta);

        })
    });
}

emit(http_server);