<?php

namespace Elastica;

use Elastic\Elasticsearch\Response\Elasticsearch;
use Psr\Http\Message\ResponseInterface;

/**
 * @author PK <projekty@pawelkeska.eu>
 */
class ResponseConverter
{
    public static function toElastica(Elasticsearch|ResponseInterface $response): Response
    {
        if ($response instanceof Elasticsearch) {
            return new Response($response->asString(), $response->getStatusCode());
        }

        return new Response($response->getBody(), $response->getStatusCode());
    }
}
