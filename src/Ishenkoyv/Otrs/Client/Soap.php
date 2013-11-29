<?php

/*                                                                                                             
 * Copyright 2013 Yurii Ishchenko <ishenkoyv@gmail.com>                    
 *                                                                                                             
 * Licensed under the MIT License (the "License");                                                                          
 */ 

namespace Ishenkoyv\Otrs\Client;

use Ishenkoyv\Otrs\AbstractClient;
use Ishenkoyv\Otrs\ClientInterface;

/**
 * Soap 
 * 
 * @author Yurii Ishchenko <ishenkoyv@gmail.com> 
 */
class Soap extends AbstractClient implements ClientInterface
{
    protected $soapUrl;
    protected $username;
    protected $password;

    protected $client;

    protected $_isDebug = false;

    public function __construct($soapUrl, $username, $password)
    {
        $this->soapUrl = $soapUrl;
        $this->username = $username;
        $this->password = $password;

        $this->client = new \SoapClient(
            null,
            array(
                'location'  => $this->soapUrl,
                'uri'       => "Core",
                'trace'     => 1,
                'login'     => $this->username,
                'password'  => $this->password,
                'style'     => SOAP_RPC,
                'use'       => SOAP_ENCODED
            )
        );
    }

    public function dispatchCall(array $params = array())
    {
        $result = false;

        $soapParams = array($this->username, $this->password);
        
        foreach ($params as $paramName => $paramValue) {
            $soapParams[] = $paramName;
            $soapParams[] = $paramValue;
        }

        try {
            $result = $this->client->__soapCall('Dispatch', $soapParams); 
            
            if (is_array($result)) {
                $result = $this->parsePairs($result);
            }

        } catch (\Exception $e) {
        }
        
        return $result;
    }

    public function getLastRequest()
    {
        return $this->client->__getLastRequest();
    }

    public function getLastResponse()
    {
        return $this->client->__getLastResponse();
    }
}
