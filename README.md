# PHP GRPC Client Test

This app spins up a dockerized environment containing a grpc server running in node, a client
that is invoked in node, and a client that is invoked in PHP.

* The grpc server is running inside the docker container at port `8080`.
* The node client can be tested by making a GET request `localhost:8081/echo`.
* The php client can be tested by making a GET request to `localhost:8082/echo`.

The GRPC server has one method, `echo`, which recieves a messages, sleeps to simulate work and returns that message along
with the timeout, for example: `{"message":"lui6obf0m5lvfyfis05ah","time":386}`. 

The client applications will return a message similar like: `Sent 5c2a529876c35 and recieved 5c2a529876c35 in 755 ms`.

## Setup

1. Run the setup script `./bin/setup.sh`. This copies the proto definition to each app dir, and installs dependencies.
2. Run `docker-compose up`.

If you need to rebuild, run `docker-compose down` and `docker-compose build` and then `docker-compose up`.

The node client and server are built as part of their docker image. Any changes to them require you to rebuild the images.
The php code is mounted to a volume, so the php application can be modified without having to rebuild the docker container.
Any changes to the php-fpm or the nginx config require a restart of the docker environment, but not a complete rebuild.
