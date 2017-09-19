<?php
/**
 * User: maykon
 * Date: 18/09/17
 * Time: 20:12
 */

namespace gdc;

use GuzzleHttp\Client;

class CervejaApi
{
    private $client;
    private $uri;

    public function __construct()
    {
        $this->client = new Client();
        $this->uri = "http://10.42.0.11:8090/graodecevada/api";
    }

    public function getCerverjas()
    {
        $resource = "/cervejas";
        $method = "GET";
        $uri_resource = $this->uri . $resource;

        $res = $this->client->request($method, $uri_resource);
        return $res->getBody();
    }

}