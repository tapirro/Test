<?php
/*
 * This file is part of the sfPropelActAsTaggableBehavior package.
 *
 * (c) 2007 Xavier Lacot <xavier@lacot.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/*
sfPropelBehavior::registerMethods('memcached', array(
  array('sfMemcachedBehavior'),
));
*/

sfPropelBehavior::registerHooks('memcached', array(
  ':save:post'                => array('sfMemcachedBehavior', 'preSave'),
 /* 'Peer:doSelect'           => array('sfMemcachedBehavior', 'doSelectRS'),      
  'Peer:doSelectRS'           => array('sfMemcachedBehavior', 'doSelectRS'),     
'Peer:retrieveByPk'           => array('sfMemcachedBehavior', 'retrieveByPk'),  */   
  
));


sfPropelBehavior::registerMethods('memcached', array (
  array (
    'sfMemcachedBehavior',
    'CriteriaCached'
  )),
 /*
    array (
    'sfMemcachedBehavior',
    'doSelect'
  ),
  */
  array (
    'sfMemcachedBehavior',
    'Peer::retrieveByPk'
  )
  );
  
  /*  */