<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include "vendor/autoload.php";

// set_error_handler(function ($s, $m) {
//     fwrite(STDERR, getmypid() . ' ' . $m . PHP_EOL);
// });

var_dump(getmypid());

use Google\Cloud\Spanner\V1\SpannerGrpcClient;
use Grpc\ChannelCredentials;

sleep(rand(1,5));
$args = ['credentials' => ChannelCredentials::createInsecure(), 'foo' => 'bar'];
$a = new SpannerGrpcClient('dummy', $args);
sleep(1);

$args = ['credentials' => ChannelCredentials::createInsecure(), 'foo' => 'bar'];
$b = new SpannerGrpcClient('dummy', $args);
