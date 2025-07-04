<?php
namespace PhpArsenal\SoapClient;

#[\AllowDynamicProperties]
final class Events
{
    const REQUEST    = 'arsenal.soap_client.request';
    const RESPONSE   = 'arsenal.soap_client.response';
    const FAULT      = 'arsenal.soap_client.fault';
}

