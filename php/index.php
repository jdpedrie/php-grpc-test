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
    $message = uniqid();
    $echoRequest->setMessage($message);

    $call = $client->Echo($echoRequest);
    /** @var \Example\EchoResponse $echoResponse */
    $echoResponse = $call->wait()[0];

    $content = "Sent {$message} and recieved {$echoResponse->getMessage()} in {$echoResponse->getTime()} ms";
    $response->getBody()->write($content);

    return $response;
});

$app->run();