<?php

/**
 * comment actions.
 *
 * @package    fuck2
 * @subpackage comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class commentComponents extends sfComponents 
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function executeIndex($request)
  {
    /*
     if($this->getUser()->isAuthenticated() ){
        $spectatorId = $this->getUser()->getAttribute('subscriber_id','','subscriber'); 
        }
     $this->forward404Unless($spectatorId); 
     */
     //print_r($request);
     $item =  $this->item;
     $id =  $item->getId();    
     //$id = $request->getParameter('id');
     //$model = $request->getParameter('model');
     //echo "||$id|$model|";
     //$peer = ucfirst($model).'Peer';
    // $class =  ucfirst($model);
    // $item = new $class;
    // $item->setId($id);
    $class =  get_class($item); 
     
    // $item = UsrPeer::RetrieveByPK($this->id);
     
     $c =  new Criteria();   
     $c->addAscendingOrderByColumn('ID');
    
    
     
    //$this->comments = $user->getUsrCommentsRelatedByUser2($c);
    if($class == 'Usr'){
        $this->comments = $item->getUsrCommentsRelatedByUser2($c);}
    else{
          $this->comments = $item->{"get{$class}Comments"}($c);
        }
    //print_r($this->comments); 
    $this->item = $item;
    $this->class = $class;
      
  }
}
