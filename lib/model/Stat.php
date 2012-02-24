<?php

/**
 * Subclass for representing a row from the 'stat' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Stat extends BaseStat
{
    public function __toString(){
     return $this->getName();   
        
    }
}
