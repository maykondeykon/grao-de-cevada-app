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
    private $resource;

    public function __construct()
    {
        $this->client = new Client();
        $this->uri = "http://172.20.2.85:8090/graodecevada";
        $this->resource = $this->uri."/api";
    }

    public function getCerverjas()
    {
        $subResource = "/cervejas";
        $method = "GET";

        $res = $this->client->request($method, $this->resource . $subResource);
        return $res->getBody();
    }

    public function getRanking()
    {
        $subResource = "/ranking";
        $method = "GET";

        $res = $this->client->request($method, $this->resource . $subResource);
        return $res->getBody();
    }

    public function getImageResource()
    {
        $subResource = "/uploads/cervejas/";
        return $this->uri .$subResource;
    }

}