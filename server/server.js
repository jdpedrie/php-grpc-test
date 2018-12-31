const grpc = require('grpc');

const proto = grpc.load('echo.proto');

const server = new grpc.Server();

const args = {
    echo: (call, callback) => {
        const timeout = Math.ceil(Math.random() * 1500);
	setTimeout(() => {
          callback(null, {
            message: call.request.message,
            time: timeout
          });
	}, timeout);
    }
};

server.addService(proto.Service.service, args)

server.bind('0.0.0.0:8080', grpc.ServerCredentials.createInsecure());
console.log('Server listening on port 8080');
server.start();
