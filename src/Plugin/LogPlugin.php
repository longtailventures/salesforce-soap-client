<?php
namespace PhpArsenal\SoapClient\Plugin;

use PhpArsenal\SoapClient\Event\RequestEvent;
use PhpArsenal\SoapClient\Event\ResponseEvent;
use PhpArsenal\SoapClient\Event\FaultEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;

/**
 * A plugin that logs messages
 *
 *  */
#[\AllowDynamicProperties]
class LogPlugin implements EventSubscriberInterface
{
    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onClientRequest(RequestEvent $event)
    {
        $this->logger->info(sprintf(
            '[php-arsenal/salesforce-soap-client] request: call "%s" with params %s',
            $event->getMethod(),
            \json_encode($event->getParams())
        ));
    }

    public function onClientResponse(ResponseEvent $event)
    {
        $this->logger->info(sprintf(
            '[php-arsenal/salesforce-soap-client] response: %s',
            \print_r($event->getResponse(), true)
        ));
    }

    public function onClientFault(FaultEvent $event)
    {
        $this->logger->error(sprintf(
            '[php-arsenal/salesforce-soap-client] fault "%s" for request "%s" with params %s',
            $event->getSoapFault()->getMessage(),
            $event->getRequestEvent()->getMethod(),
            \json_encode($event->getRequestEvent()->getParams())
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'arsenal.soap_client.request'  => 'onClientRequest',
            'arsenal.soap_client.response' => 'onClientResponse',
            'arsenal.soap_client.fault'    => 'onClientFault'
        );
    }
}
