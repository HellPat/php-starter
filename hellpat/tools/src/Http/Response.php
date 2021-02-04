<?php

declare(strict_types=1);

namespace HellPat\Tools\Http;


use Fig\Http\Message\StatusCodeInterface;
use Nyholm\Psr7\Response as ResponseImplementation;
use Psr\Http\Message\ResponseInterface;

/**
 * @psalm-immutable
 */
final class Response
{
    public static function create(string $body, int $status, array $headers = []): ResponseInterface
    {
        return new ResponseImplementation($status, $headers, $body);
    }

    public static function ok(string $body, array $headers = []): ResponseInterface
    {
        return self::create($body, StatusCodeInterface::STATUS_OK, $headers);
    }

    public static function notFound(string $body, array $headers = []): ResponseInterface
    {
        return self::create($body, StatusCodeInterface::STATUS_NOT_FOUND, $headers);
    }
}