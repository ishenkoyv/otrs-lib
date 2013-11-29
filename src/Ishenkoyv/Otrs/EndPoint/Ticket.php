<?php

/*                                                                                                             
 * Copyright 2013 Yurii Ishchenko <ishenkoyv@gmail.com>                    
 *                                                                                                             
 * Licensed under the MIT License (the "License");                                                                          
 */ 

namespace Ishenkoyv\Otrs\EndPoint;

use Ishenkoyv\Otrs\AbstractEndPoint;

/**
 * Ticket Object
 *
 *
 * OTRS 3.0 API Kernel::System::Ticket
 * http://dev.otrs.org/3.0/Kernel/System/Ticket.html
 * 
 * @author Yurii Ishchenko <ishenkoyv@gmail.com> 
 */
class Ticket extends AbstractEndPoint
{
    protected $objectName = 'TicketObject';

    /**
     * Get ticket info 
     * 
     * OTRS 3.0 API - TicketGet()
     * 
     * @param int $ticketId 
     * @param int $userId 
     * @param boolean $extended True if you want to get extended ticket attributes
     *
     * @access public
     *
     * @return array Ticket info
     */
    public function ticketGet($ticketId, $userId = null, $extended = false)
    {
        $params = array('TicketID' => (int) $ticketId);

        if ($userId) {
            $params['UserID'] = (int) $userId;
        }

        if ($extended) {
            $params['Extended'] = 1;
        }

        return $this->callClient('TicketGet', $params);
    }

    /**
     * Find tickets in OTRS system 
     * 
     * OTRS 3.0 API - TicketGet()
     *
     * @param array $searchParams 
     * @param mixed $userId UserId of user with rights to access tickets
     * @param string $resultType 'ARRAY' || 'HASH' || 'COUNT'
     *
     * @access public
     *
     * @return void
     */
    public function ticketSearch($searchParams = array(), $userId, $resultType = 'ARRAY')
    {
        $result = array();                                                                                     

        $supportedResultTypes = array('ARRAY', 'HASH', 'COUNT');

        if (!in_array($resultType, $supportedResultTypes)) {
            throw new \InvalidArgumentException('Invalid result type');
        }
                                                                                                               
        $params = array(
            'UserID' => (int) $userId,
            'Result' => $resultType,
        );

        $params = array_merge($params, $searchParams);

        $result = $this->callClient('TicketSearch', $params);

        return $result;
    }
    
}
