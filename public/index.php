<?php


use HellPat\Tools\Http\Response;
use HellPat\Tools\Http\ServerRequest;
use Symfony\Component\ErrorHandler\Debug;
use function Http\Response\send;

require_once __DIR__.'/../vendor/autoload.php';

Debug::enable();

$request = ServerRequest::createFromGlobals();

$uri = $request->getUri()->getPath();

try {
    $action = match($uri) {
        '/' => fn($request) => Response::ok(''),
    };

    $response = $action($request);
    send($response);
} catch (UnhandledMatchError $e) {
    send((fn($request) => Response::notFound(''))($request));
}


