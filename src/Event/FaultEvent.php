<?php
namespace PhpArsenal\SoapClient\Event;

use Symfony\Contracts\EventDispatcher\Event;

#[\AllowDynamicProperties]
class FaultEvent extends Event
{
    protected $soapFault;

    protected $requestEvent;

    public function __construct(\SoapFault $soapFault, RequestEvent $requestEvent)
    {
        $this->setSoapFault($soapFault);
        $this->setRequestEvent($requestEvent);
    }

    public function getSoapFault()
    {
        return $this->soapFault;
    }

    public function setSoapFault($soapFault)
    {
        $this->soapFault = $soapFault;
    }

    public function getRequestEvent()
    {
        return $this->requestEvent;
    }

    public function setRequestEvent(RequestEvent $requestEvent)
    {
        $this->requestEvent = $requestEvent;
    }
}
