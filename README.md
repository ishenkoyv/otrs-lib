OTRS HELP DESK SOAP API 3.0 php client
======================================

This library allow you to access OTRS Help Desk tickets, users etc. through OTRS SOAP API.
The OTRS source code is published under the Affero General Public License (AGPL v3)
and therefore available for free download. It is hosted in a [git repository](http://otrs.github.io/)
that allows to keep track of all work and all changes made by several
community-based developers who collaborate with the OTRS developers.
OTRS has more than 1.650.000 of downloads and 110.000 of installations.

Realized APIs
-------------
- Kernel::System::Ticket (Partial)

Requirements
------------
- PHP 5 >= 5.3.0
- [PHP SOAP extension] (http://php.net/manual/en/book.soap.php) for Soap Client

Installation
------------

### Server side (OTRS server)

In order to enable the RPC interface in OTRS you have to set a user name and password under Admin > SysConfig > Framework > Core::Soap. Also, you might want to verify that the Perl module SOAP::Lite is installed. 

### Client side
Download library with composer or manualy. Use OTRS server RPC url, username and password with library.

Examples
--------

Basic usage

    require 'vendor/autoload.php';

    use Ishenkoyv\Otrs\Client\Soap as Client;
    use Ishenkoyv\Otrs\EndPoint\Ticket as Ticket;

    $client = new Client('http://example.com/otrs/rpc.pl', 'otrs_soap', 'password');
    $ticket = new Ticket($client);

    $ticketId = 1363;
    $userId = 1;

    $ticketInfo = $ticket->ticketGet($ticketId, 1);
    $lastRequest = $ticket->getClient()->getLastRequest();
    $lastResponse = $ticket->getClient()->getLastResponse();



