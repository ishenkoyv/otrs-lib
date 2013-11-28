<?php

/*                                                                                                             
 * Copyright 2013 Yurii Ishchenko <ishenkoyv@gmail.com>                    
 *                                                                                                             
 * Licensed under the MIT License (the "License");                                                                          
 */ 

namespace Ishenkoyv\Otrs;

/**
 * AbstractEndPoint 
 * 
 * @author Yurii Ishchenko <ishenkoyv@gmail.com> 
 */
abstract class AbstractEndPoint
{
    protected $client;
    protected $objectName;
    
    function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getObjectName()
    {
        if (empty($this->objectName)) {
            throw new \InvalidArgumentException('Object name is invalid');
        }
        return $this->objectName;
    }

    protected function callClient($method, array $params = array())
    {
        $endpoint = array($this->getObjectName() => $method);
        $params = array_merge($endpoint, $params);

        return $this->client->dispatchCall($params);
    }

}
