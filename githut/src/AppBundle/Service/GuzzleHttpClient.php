<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 4/8/17
 */

namespace AppBundle\Service;


use GuzzleHttp\Client;

class GuzzleHttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($url)
    {
        $response = $this->client->get($url);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function post($url, $data)
    {
        // TODO: Implement post() method.
    }
}