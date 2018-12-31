<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$client = new \Example\ServiceClient("grpc_server:8080", [
    'credentials' => \Grpc\ChannelCredentials::createInsecure()
]);

$app->get('/echo', function (Request $request, Response $response, array $args) use ($client) {
    $echoRequest = new \Example\EchoRequest();
    $echoRequest->setMessage(uniqid());

    $call = $client->Echo($echoRequest);
    /** @var \Example\EchoResponse $echoResponse */
    $echoResponse = $call->wait()[0];

    $response->getBody()->write($echoResponse->getMessage() . " took " . $echoResponse->getTime() . " ms");

    return $response;
});

$app->run();