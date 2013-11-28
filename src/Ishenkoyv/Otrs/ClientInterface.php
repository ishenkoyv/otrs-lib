<?php

/*                                                                                                             
 * Copyright 2013 Yurii Ishchenko <ishenkoyv@gmail.com>                    
 *                                                                                                             
 * Licensed under the MIT License (the "License");                                                                          
 */ 

namespace Ishenkoyv\Otrs;

/**
 * ClientInterface 
 * 
 * @author Yurii Ishchenko <ishenkoyv@gmail.com> 
 */
interface ClientInterface
{
    public function dispatchCall(array $params = array());
}
