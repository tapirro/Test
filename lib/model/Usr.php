<?php

/**
 * Subclass for representing a row from the 'usr' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Usr extends BaseUsr
{
    public function __toString(){
     return $this->getLogin();   
        
    }
    
    public function getLink(){
     return $this->getLogin();   
        
    }
    
    public function countTestingTasks($criteria = null, $distinct = false, $con = null)
    {
        if ($criteria === null) {
            $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
            $criteria = clone $criteria;
        }
        $criteria->add(TaskPeer::STATID, 3);

        return $this->countTasksRelatedByUserid($criteria, $distinct, $con);
    }
    
    
 }
