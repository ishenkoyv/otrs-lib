<?php

/*                                                                                                             
 * Copyright 2013 Yurii Ishchenko <ishenkoyv@gmail.com>                    
 *                                                                                                             
 * Licensed under the MIT License (the "License");                                                                          
 */ 

namespace Ishenkoyv\Otrs\EndPoint;

use Ishenkoyv\Otrs\AbstractEndPoint;

/**
 * Ticket 
 * 
 * @author Yurii Ishchenko <ishenkoyv@gmail.com> 
 */
class Ticket extends AbstractEndPoint
{
    protected $objectName = 'TicketObject';

    public function getById($id)
    {
        $params = array('TicketID' => $id);

        return $this->callClient('TicketGet', $params);
    }
    
}
