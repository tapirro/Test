<?php

/**
 * Subclass for representing a row from the 'sys_pic' table.
 *
 * 
 *
 * @package lib.model
 */ 
class SysPic extends BaseSysPic
{
    public function __toString(){
     return $this->getFilename();   
        
    }
}
