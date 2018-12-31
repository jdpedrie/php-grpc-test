# PHP GRPC Client Test

This app spins up a dockerized environment containing a grpc server running in node, a client
that is invoked in node, and a clien that is invoked in PHP.

* The grpc server is running inside the docker container at port `8080`.
* The node client can be tested by making a GET request `localhost:8081/echo`.
* The php client can be tested by making a GET request to `localhost:8082`.

The GRPC server has one method, `echo`, which recieves a messages, sleeps to simulate work, and returns that message along
with the timeout, for example: `{"message":"lui6obf0m5lvfyfis05ah","time":386}`. 

