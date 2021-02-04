<?php

declare(strict_types=1);

namespace HellPat\Tools\Http;


use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @psalm-immutable
 */
final class ServerRequest
{
    private static function factory(): ServerRequestCreator
    {
        return new ServerRequestCreator(
            new Psr17Factory(),
            new Psr17Factory(),
            new Psr17Factory(),
            new Psr17Factory()
        );
    }

    public static function createFromGlobals(): ServerRequestInterface
    {
        return self::factory()->fromGlobals();
    }
}