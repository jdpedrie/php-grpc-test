const grpc = require('grpc');

const proto = grpc.load('echo.proto');

const server = new grpc.Server();

// Creates a promise that writes to a grpc stream, and resolves when done
const promiseTimeout = (index, call) => new Promise((res,rej) => {
    const time = Math.ceil(Math.random() * 1500);
    setTimeout(() => {
        call.write({
            message: call.request.message,
            time,
            index
        });
        res(index);
    }, time);
});

const args = {
    echo: (call, callback) => {
        const timeout = Math.ceil(Math.random() * 1500);
        setTimeout(() => {
            callback(null, {
                message: call.request.message,
                time: timeout,
                index: 0
            });
        }, timeout);
    },
    echoStream: async (call) => {
        // Create 20 responses, stream them, and call stream when all are done.
        const promises = new Array(20)
                            .fill(null)
                            .map((_,i) => promiseTimeout(i, call));

        await Promise.all(promises);
        call.end();
    }
};

server.addService(proto.example.Service.service, args)

server.bind('0.0.0.0:8080', grpc.ServerCredentials.createInsecure());
console.log('Server listening on port 8080');
server.start();
