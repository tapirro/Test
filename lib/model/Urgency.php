<?php

/**
 * Subclass for representing a row from the 'urgency' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Urgency extends BaseUrgency
{
    public function __toString(){
     return $this->getName();   
        
    }
}
