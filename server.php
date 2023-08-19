#!/usr/bin/env php
<?php
declare(strict_types=1);
require_once "vendor/autoload.php";

use RinhaBackEnd\HelloWorld;
use Swoole\Http\Request;
use Swoole\Http\Response;
use Swoole\Http\Server;

$http = new Server("0.0.0.0", 9501);

$http->on(
    "start",
    function (Server $http) {
        echo "Swoole HTTP server is started.\n";
    }
);
$http->on(
    "request",
    function (Request $request, Response $response) {

        $helloWorld = new HelloWorld();
        $stringToRespond = "Hello, World!\n" .
            $helloWorld->firstEverString() . "\n";
        $response->end($stringToRespond);
    }
);

$http->start();