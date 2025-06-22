<?php
namespace PhpArsenal\SoapClient\Event;

use Symfony\Contracts\EventDispatcher\Event;

class RequestEvent extends Event
{
    protected $method;
    protected $params = [];
    protected $response;

    public function __construct($method, array $params = [])
    {
        $this->setMethod($method);
        $this->setParams($params);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method): void
    {
        $this->method = $method;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse($response): void
    {
        $this->response = $response;
    }
}

