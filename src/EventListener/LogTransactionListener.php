<?php

namespace PhpArsenal\SoapClient\EventListener;

use PhpArsenal\SoapClient\Event;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

class LogTransactionListener
{
    /**
     * Logger
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Whether logging is enabled
     *
     * @var boolean
     */
    private $logging;
    
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onSalesforceClientResponse(Event\ResponseEvent $event): void
    {
        if (true === $this->logging) {
            $this->logger->debug('[Salesforce] response:', [$event->getResponse()]);
        }
    }

    public function onSalesforceClientSoapFault(Event\SoapFaultEvent $event): void
    {
        $this->logger->err('[Salesforce] fault: ' . $event->getSoapFault()->getMessage());
    }

    public function onSalesforceClientError(Event\ErrorEvent $event): void
    {
        $error = $event->getError();
        $this->logger->err('[Salesforce] error: ' . $error->statusCode . ' - '
                           . $error->message, get_object_vars($error));
    }

    public function setLogging($logging): void
    {
        $this->logging = $logging;
    }

    public function getLogging()
    {
        return $this->logging;
    }
}