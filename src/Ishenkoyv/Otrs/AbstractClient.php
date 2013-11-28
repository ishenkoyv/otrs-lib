<?php

/*                                                                                                             
 * Copyright 2013 Yurii Ishchenko <ishenkoyv@gmail.com>                    
 *                                                                                                             
 * Licensed under the MIT License (the "License");                                                                          
 */ 

namespace Ishenkoyv\Otrs;

/**
 * AbstractClient 
 * 
 * @author Yurii Ishchenko <ishenkoyv@gmail.com> 
 */
abstract class AbstractClient
{
    public function parsePairs(array $data)                                     
    {                                                                                                          
        $result = array();                                                                                     
                                                                                                               
        $counter = 1;                                                                                          
        $key = null;                                                                                           
        foreach ($data as $value) {                                                                            
            if ($counter % 2 == 0) {                                                                           
                $result[$key] = $value;                                                                        
            } else {                                                                                           
                $result[$value] = null;                                                                        
                $key = $value;                                                                                 
            }                                                                                                  
            $counter++;                                                                                        
        }                                                                                                      
                                                                                                               
        return $result;                                                                                        
    }   
}
