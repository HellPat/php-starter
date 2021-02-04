<?php


use HellPat\Tools\Http\Response;
use HellPat\Tools\Http\ServerRequest;
use Symfony\Component\ErrorHandler\Debug;
use function Http\Response\send;

require_once __DIR__.'/../vendor/autoload.php';

Debug::enable();

$request = ServerRequest::createFromGlobals();

send((fn($request) => Response::ok(''))($request));