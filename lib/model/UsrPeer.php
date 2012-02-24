<?php

/**
 * Subclass for performing query and update operations on the 'usr' table.
 *
 * 
 *
 * @package lib.model
 */ 
class UsrPeer extends BaseUsrPeer
{
    /*
    public static function retrieveByPK($pk, PropelPDO $con = null)    
    {
      return sfMemcachedBehavior::retrieveByPK(__CLASS__, $pk, $con);
    } 
    
    */
    
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        $criteria->add(UsrPeer::HIDDEN, false);
        return UsrPeer::populateObjects(UsrPeer::doSelectStmt($criteria, $con));
    }
    
    /*
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)  
    {
                $criteria = clone $criteria;
                $criteria->add(UsrPeer::HIDDEN, false);     

                $criteria->clearSelectColumns()->clearOrderByColumns();
        if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->addSelectColumn(UsrPeer::COUNT_DISTINCT);
        } else {
            $criteria->addSelectColumn(UsrPeer::COUNT);
        }

                foreach($criteria->getGroupByColumns() as $column)
        {
            $criteria->addSelectColumn($column);
        }

        $rs = UsrPeer::doSelectRS($criteria, $con);
        if ($rs->next()) {
            return $rs->getInt(1);
        } else {
                        return 0;
        }
    }
    */

}
