<?php


use HellPat\Tools\Http\Response;
use HellPat\Tools\Http\ServerRequest;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\ErrorHandler\Debug;
use function Http\Response\send;

require_once __DIR__.'/../vendor/autoload.php';

Debug::enable();

$request = ServerRequest::createFromGlobals();

$uri = $request->getUri()->getPath();

$class = new class {
    public function __invoke(RequestInterface $request): ResponseInterface {
        return Response::ok('');
    }
};

try {
    $action = match($uri) {
        '/' => fn($request) => Response::ok(''),
        '/response' => Response::ok(''),
        '/class' => $class,
    };

    if ($action instanceof ResponseInterface) {
        send($action);
        return;
    }

    $response = $action($request);
    send($response);
} catch (UnhandledMatchError $e) {
    send(Response::notFound(''));
}


