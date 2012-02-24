<?php

/**
 * comment actions.
 *
 * @package    fuck2
 * @subpackage comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 9301 2008-05-27 01:08:46Z dwhittle $
 */
class commentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function executeNew($request)
  {
     if($this->getUser()->isAuthenticated() ){
        $spectatorId = $this->getUser()->getAttribute('subscriber_id','','subscriber'); 
        }
     $this->forward404Unless($spectatorId); 
    
    /* активирован? =========================== */
     	$usr = UsrPeer::retrieveByPK($spectatorId);
		if($usr and !$usr->getRank()){
		$this->renderText('<div class="item">Необходимо <a href="/usr/activate">активировать аккаунт!</a></div>');
        return //sfView::NONE;
		;}
     
     $msg =  str_replace('"', "", str_replace("'", "", strip_tags($this->getRequestParameter('content'), "<img>")));
     $model =  str_replace('"', "", str_replace("'", "", strip_tags($this->getRequestParameter('model'))));
     $recipientid = intval($this->getRequestParameter('recipientid')); 
    
    //echo "$msg | $model | $recipientid<br/>";
     
     if($recipientid and $msg){
         $user = UsrPeer::RetrieveByPK($spectatorId);
        $commentModel = ucfirst($model).'Comment';
         
        $comment =  new $commentModel();
        $comment->setContent($msg);
        $comment->setUserid($spectatorId );
        if($model == "Usr"){
             $comment->setUser2($recipientid);  
            }
        else{
            $comment->{'set'.ucfirst($model).'id'}($recipientid);
            }
            
        $comment->save();
        $this->renderText('<div class="item">'.$user->getLink()."&nbsp|&nbsp;".$comment->getCreatedat().'<p>'.$msg.'</p></div>');
        //return sfView::NONE;
        } //return sfView::NONE;
      $this->redirect("http://$_SERVER[HTTP_HOST]/task");  
      
  }
  
  public function executeDelete($request)
    {
        $id = $request->getParameter('id');
        
        if($this->getUser()->isAuthenticated() ){
            $spectatorId = $this->getUser()->getAttribute('subscriber_id','','subscriber'); 
        } else {
            $this->redirect('/usr/create');
        }
        
        
        /* активирован? =========================== */
         $usr = UsrPeer::retrieveByPK($spectatorId);
        if($usr and !$usr->getRank()){$this->redirect('usr/activate');}
        
        $item = $this->item;  
        $class = get_class($item)."CommentPeer"; 
        
        //$this->comment = $class::retrieveByPK($id);
        
        if ($this->comment) {
            $this->comment->delete();
        }
    }
}
