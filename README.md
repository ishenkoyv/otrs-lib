otrs-lib
========

PHP soap client for OTRS Help Desk (http://dev.otrs.org)

Basic usage::


    $client = new Client('http://example.com/otrs/rpc.pl', 'otrs_soap', 'password');
    $ticket = new Ticket($client);
    $ticketId = 1363;
    $ticketInfo = $ticket->getById($ticketId);

