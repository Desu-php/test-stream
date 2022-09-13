<?php

namespace App\Services;

use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class AntMedia
{
    private PendingRequest $http;

    public function __construct()
    {
        $this->http = Http::baseUrl('http://89.22.229.228:5080/Ikromov/rest/v2/broadcasts/');
    }

    /**
     * @param array $args
     * @return PromiseInterface|Response
     */
    public function broadcastCreate(array $args): PromiseInterface|Response
    {
        return $this->http->post('create', $args);
    }

    public function broadcastsList(int $offset, int $size): PromiseInterface|Response
    {
        return $this->http->get("list/$offset/$size");
    }

    public function broadcastsCount(): PromiseInterface|Response
    {
        return $this->http->get('count');
    }

    public function getBroadcastById(string $id): PromiseInterface|Response
    {
        return $this->http->get($id);
    }
}
