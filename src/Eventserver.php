<?php

namespace Towa\Eventserver;


use Exception;
use GuzzleHttp\Client;

class Eventserver
{
    /** @var string */
    private $apiVersion;

    /** @var string */
    private $baseUrl;

    /** @var \GuzzleHttp\Client */
    private $client;

    /** @var array */
    private $options;

    /** @var string */
    private $token;

    public function __construct($token = null)
    {
        if (null === $token) {
            throw new Exception('You must provide your eventserver token');
        }

        $this->apiVersion = 'v2';
        $this->baseUrl = 'https://eventserver.v-ticket.at/api';
        $this->client = new Client();
        $this->options = [];
        $this->token = $token;
    }

    public function get()
    {
        return $this->make_request();
    }

    /**
     * @return array
     */
    private function make_request()
    {
        $response = $this->client
            ->get(
                $this->build_enpoint_url('events', $this->options),
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Authorization' => "Bearer $this->token",
                    ]
                ]
            )
            ->getBody()
            ->getContents();

        return json_decode($response, true);
    }

    /**
     * Build endpoint with given options
     *
     * @param $endpoint
     * @param array $options
     *
     * @return string
     */
    private function build_enpoint_url($endpoint, array $options = [])
    {
        return sprintf(
            '%1$s/%2$s/%3$s?%4$s',
            $this->baseUrl,
            $this->apiVersion,
            $endpoint,
            http_build_query($options)
        );
    }
}